<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\spp;

class siswacontroller extends Controller
{
    public function index(){
        $siswaInfo=siswa::with('spp','kelas')->get();
        return response()->json([
            'data'=>$siswaInfo
        ]);
    }

    public function getInfoSiswaById($id){
        $siswaByid = siswa::join('spps', 'siswas.id_spp', '=', 'spps.id')
            ->join('kelas','siswas.id_kelas','=','kelas.id')
            ->where('siswas.id', $id)
            ->get(['siswas.*','spps.*','kelas.*' ]);
            
        return response()->json([
                'data'=>$siswaByid,
        ]);
    }
}
