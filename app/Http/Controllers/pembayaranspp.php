<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
use Illuminate\Support\Facades\Validator;

class pembayaranspp extends Controller
{
    public function detailSimpanSpp(Request $request){

        $simpanSpp=pembayaran::create([
            'id_user'=>2,
            'id_siswa'=>$request->id_siswa,
            'tgl_bayar'=>$request->tgl_bayar,
            'id_bulan'=>$request->id_bulan,
            'thn_bayar'=>$request->tahun_bayar,
            'id_spp'=>$request->id_spp,
            'jumlah_bayar'=>$request->totalDibayar
        ]);
        if($simpanSpp){
            return response()->json([
                'pesan'=>'SPP Berhasil di bayarkan',
                'data'=>$simpanSpp
            ]);
        }
    }

    public function index($idBulan, $idSiswa,$tahun){

    //    echo $idBulan.'<br>';
    //    echo $idSiswa.'<br>';
    //    echo $tahun.'<br>';

        $pembayaran = pembayaran::where('id_bulan', $idBulan)
        ->where('id_siswa', $idSiswa)
        ->where('thn_bayar', $tahun)
        ->first();

        if($pembayaran){
            return response()->json([
                'pesan'=>'data di temukan'
            ]);
        }else{

            return response()->json([
                'pesan'=>'data tidak di temukan'
            ]);
        }
    }

    public function tampilSppById($idSiswa,$tahun){

        // echo $idSiswa.'<br>';
        // echo $tahun.'<br>';

        $tampilsiswaByid = pembayaran::join('bulans', 'pembayarans.id_bulan', '=', 'bulans.id')
        ->join('spps','pembayarans.id_spp','=','spps.id')
        ->where('pembayarans.id_siswa', $idSiswa)
        ->where('pembayarans.thn_bayar', $tahun)
        ->get(['pembayarans.id','pembayarans.tgl_bayar','bulans.nama_bulan','spps.nominal' ]);

        return response()->json([
                'data'=>$tampilsiswaByid,
        ]);
    }

    public function hapusPembayaran($id){
        $hapus=pembayaran::findOrFail($id);
        if($hapus) {
            $hapus->delete();
            return response()->json([
                'success' => true,
            ], 200);
        }
    }
}
