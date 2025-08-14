<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()   { return view('store.index'); }
    public function show(string $idOrSlug) { return view('store.show', ['idOrSlug' => $idOrSlug]); }
    public function cart()    { return view('store.cart'); }
    public function checkout(){ return view('store.checkout'); }
}
