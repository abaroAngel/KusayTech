<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    // GET /api/brands
    public function index()
    {
        $brands = Brand::where('is_active', true)->orderBy('name')->get(['id','name','slug','logo_path']);
        return response()->json($brands);
    }

    // GET /api/brands/{id-or-slug}
    public function show(string $idOrSlug)
    {
        $brand = Brand::when(is_numeric($idOrSlug),
                    fn($q)=>$q->where('id',$idOrSlug),
                    fn($q)=>$q->where('slug',$idOrSlug)
                 )->firstOrFail();

        return response()->json($brand);
    }
}
