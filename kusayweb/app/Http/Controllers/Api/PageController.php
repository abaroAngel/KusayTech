<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return response()->json([
            'slug'         => $page->slug,
            'title'        => $page->title,
            'content'      => $page->content_json,
            'seo'          => $page->seo_json,
            'published_at' => $page->published_at,
        ]);
    }
}
