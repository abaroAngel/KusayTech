<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::with(['hours' => function($q){
            $q->orderBy('day_of_week')->orderBy('start_time');
        }])->get();

        return response()->json($offices);
    }
}
