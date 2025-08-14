<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /api/products?q=&category_id=&brand_id=&min=&max=&active=1&per_page=12&page=1
    public function index(Request $request)
    {
        $filters = $request->only(['q','category_id','brand_id','min','max','active']);

        $perPage = (int) ($request->integer('per_page') ?: 12);
        $perPage = max(1, min(100, $perPage));

        $products = Product::query()
            ->with(['images' => fn($q)=>$q->orderBy('order') , 'brand:id,name,slug', 'category:id,name,slug'])
            ->filter($filters)
            ->orderBy('id','desc')
            ->paginate($perPage);

        return response()->json($products);
    }

    // GET /api/products/{id-or-slug}
    public function show(string $idOrSlug)
    {
        $product = Product::with(['images' => fn($q)=>$q->orderBy('order'), 'brand', 'category'])
            ->when(is_numeric($idOrSlug),
                fn($q)=>$q->where('id', $idOrSlug),
                fn($q)=>$q->where('slug', $idOrSlug)
            )
            ->firstOrFail();

        return response()->json($product);
    }
}
