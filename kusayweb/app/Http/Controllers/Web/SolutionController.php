<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SolutionController extends Controller
{
    public function erp(){ return view('solutions.erp'); }
    public function software(){ return view('solutions.software'); }
    public function marketing(){ return view('solutions.marketing'); }
}
