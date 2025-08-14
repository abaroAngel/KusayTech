<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function contact(){ return view('forms.contact'); }
    public function guide(){ return view('forms.guide'); }
    public function voucher(){ return view('forms.voucher'); }
    public function claim(){ return view('forms.claim'); }
    public function ethics(){ return view('forms.ethics'); }
}
