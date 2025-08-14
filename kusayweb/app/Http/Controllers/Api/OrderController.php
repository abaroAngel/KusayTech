<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cart, CartItem, Order, OrderItem};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // POST /api/orders/checkout
    public function checkout(Request $request)
    {
        $data = $request->validate([
            'customer.name'  => ['required','string','max:120'],
            'customer.email' => ['required','email:rfc,dns','max:150'],
            'customer.phone' => ['nullable','string','max:20'],

            'billing.ruc'      => ['nullable','regex:/^[0-9]{11}$/'],
            'billing.company'  => ['nullable','string','max:180'],
            'billing.address'  => ['nullable','string','max:200'],

            'shipping'         => ['nullable','array'],
        ]);

        // Obtener carrito
        $cartCtrl = app(CartController::class);
        $cart = $cartCtrl->resolveCart($request, withItems: true);

        if ($cart->items()->count() === 0) {
            return response()->json(['message' => 'El carrito está vacío.'], 422);
        }

        // Crear orden atómica
        $order = DB::transaction(function () use ($cart, $data) {
            $code = 'ORD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));

            $items = $cart->items()->with('product')->get();

            $subtotal = 0;
            foreach ($items as $i) {
                $price = $i->product->price;
                $subtotal += $price * $i->qty;
            }

            $tax = 0; // si hay IGV, calcula aquí
            $discount = 0;
            $total = $subtotal + $tax - $discount;

            $order = Order::create([
                'user_id'        => optional(request()->user())->id,
                'code'           => $code,
                'status'         => 'pending',
                'customer_json'  => $data['customer'],
                'billing_json'   => $data['billing'] ?? null,
                'shipping_json'  => $data['shipping'] ?? null,
                'subtotal'       => $subtotal,
                'discount_total' => $discount,
                'tax_total'      => $tax,
                'total'          => $total,
                'currency'       => 'PEN',
            ]);

            foreach ($items as $i) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $i->product_id,
                    'name'       => $i->product->name,
                    'sku'        => $i->product->sku,
                    'qty'        => $i->qty,
                    'unit_price' => $i->product->price,
                    'total'      => $i->qty * $i->product->price,
                ]);
            }

            // Marcar carrito como convertido y vaciar
            $cart->update(['status' => 'converted']);
            $cart->items()->delete();

            return $order;
        });

        return response()->json([
            'message'  => 'Orden creada correctamente.',
            'order_id' => $order->id,
            'code'     => $order->code,
            'total'    => (float) $order->total,
            'status'   => $order->status,
        ], 201);
    }

    // GET /api/orders/{code}
    public function show(string $code)
    {
        $order = Order::with(['items','payments'])->where('code', $code)->firstOrFail();
        return response()->json($order);
    }
}
