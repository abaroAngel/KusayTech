<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()->active()->orderBy('order')->get(['id','question','answer']);
        return response()->json($faqs);
    }
}
