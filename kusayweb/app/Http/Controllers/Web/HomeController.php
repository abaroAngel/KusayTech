<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\{Banner, ValueProp, Pillar, Faq};

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'banners'     => Banner::query()->where('active',1)->orderBy('order')->get(),
            'valueProps'  => ValueProp::query()->where('active',1)->orderBy('order')->get(),
            'pillars'     => Pillar::query()->where('active',1)->orderBy('order')->get(),
            'faqs'        => Faq::query()->where('active',1)->orderBy('order')->get(),
        ]);
    }
}
