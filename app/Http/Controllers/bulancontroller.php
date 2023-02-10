<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bulan;

class bulancontroller extends Controller
{
    public function index(){
        $bulan=bulan::orderBy('id', 'ASC')->get();
        return response()->json([
            'data'=>$bulan
        ]);
    }
}
