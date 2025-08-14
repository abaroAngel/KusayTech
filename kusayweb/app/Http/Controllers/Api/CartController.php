<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cart, CartItem, Product};
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // GET /api/cart
    public function show(Request $request)
    {
        $cart = $this->resolveCart($request, withItems: true);
        return response()->json($this->serializeCart($cart));
    }

    // POST /api/cart/items {product_id, qty}
    public function addItem(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required','integer','exists:products,id'],
            'qty'        => ['required','integer','min:1','max:999'],
        ]);

        $cart = $this->resolveCart($request);

        $product = Product::findOrFail($data['product_id']);
        if (!$product->is_active || $product->stock < $data['qty']) {
            return response()->json(['message' => 'Producto no disponible o stock insuficiente.'], 422);
        }

        $item = CartItem::firstOrNew([
            'cart_id'    => $cart->id,
            'product_id' => $product->id,
        ]);

        $newQty = ($item->exists ? $item->qty : 0) + $data['qty'];
        if ($product->stock < $newQty) {
            return response()->json(['message' => 'Stock insuficiente.'], 422);
        }

        $item->qty = $newQty;
        $item->unit_price = $product->price;
        $item->total = $item->qty * $item->unit_price;
        $item->save();

        return response()->json($this->serializeCart($this->resolveCart($request, withItems: true)));
    }

    // PATCH /api/cart/items/{id} {qty}
    public function updateItem(Request $request, int $id)
    {
        $data = $request->validate([
            'qty' => ['required','integer','min:1','max:999'],
        ]);

        $cart = $this->resolveCart($request);
        $item = CartItem::where('cart_id', $cart->id)->where('id', $id)->firstOrFail();

        $product = Product::findOrFail($item->product_id);
        if ($product->stock < $data['qty']) {
            return response()->json(['message' => 'Stock insuficiente.'], 422);
        }

        $item->qty = $data['qty'];
        $item->unit_price = $product->price;
        $item->total = $item->qty * $item->unit_price;
        $item->save();

        return response()->json($this->serializeCart($this->resolveCart($request, withItems: true)));
    }

    // DELETE /api/cart/items/{id}
    public function removeItem(Request $request, int $id)
    {
        $cart = $this->resolveCart($request);
        CartItem::where('cart_id', $cart->id)->where('id', $id)->delete();

        return response()->json($this->serializeCart($this->resolveCart($request, withItems: true)));
    }

    // DELETE /api/cart
    public function clear(Request $request)
    {
        $cart = $this->resolveCart($request);
        CartItem::where('cart_id', $cart->id)->delete();

        return response()->json($this->serializeCart($this->resolveCart($request, withItems: true)));
    }

    // Helpers
    protected function resolveCart(Request $request, bool $withItems = false): Cart
    {
        $sessionId = $request->header('X-Session-Id') ?: $request->session()->getId();
        $userId = optional($request->user())->id;

        $query = Cart::query()->where('status','open')
                  ->when($userId, fn($q)=>$q->where('user_id',$userId))
                  ->when(!$userId, fn($q)=>$q->where('session_id',$sessionId));

        $cart = $query->first();

        if (!$cart) {
            $cart = Cart::create([
                'user_id'    => $userId,
                'session_id' => $userId ? null : $sessionId,
                'status'     => 'open',
            ]);
        }

        if ($withItems) $cart->load(['items.product:id,name,slug,price,stock']);

        return $cart;
    }

    protected function serializeCart(Cart $cart): array
    {
        $cart->loadMissing(['items.product:id,name,slug,price,stock']);

        $items = $cart->items->map(function ($i) {
            return [
                'id'         => $i->id,
                'product_id' => $i->product_id,
                'name'       => optional($i->product)->name,
                'slug'       => optional($i->product)->slug,
                'qty'        => (int) $i->qty,
                'unit_price' => (float) $i->unit_price,
                'total'      => (float) $i->total,
                'stock'      => optional($i->product)->stock,
            ];
        });

        $subtotal = (float) $items->sum('total');

        return [
            'id'       => $cart->id,
            'status'   => $cart->status,
            'items'    => $items,
            'subtotal' => $subtotal,
        ];
    }
}
