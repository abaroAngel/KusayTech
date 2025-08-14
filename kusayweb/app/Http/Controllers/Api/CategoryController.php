<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $cats = Category::withCount('children')
            ->whereNull('parent_id')
            ->with(['children' => fn($q)=>$q->withCount('children')->orderBy('name')])
            ->orderBy('name')
            ->get();

        return response()->json($cats);
    }

    // GET /api/categories/{id-or-slug}
    public function show(string $idOrSlug)
    {
        $cat = Category::with(['children' => fn($q)=>$q->orderBy('name')])
            ->when(is_numeric($idOrSlug),
                fn($q)=>$q->where('id', $idOrSlug),
                fn($q)=>$q->where('slug', $idOrSlug)
            )
            ->firstOrFail();

        return response()->json($cat);
    }
}
