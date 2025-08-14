<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CmsController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('cms.page', compact('page'));
    }
}
