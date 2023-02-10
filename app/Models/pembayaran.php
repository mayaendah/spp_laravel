<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayarans';
    protected $fillable=[
        'id_user',
        'id_siswa',
        'tgl_bayar',
        'id_bulan',
        'thn_bayar',
        'id_spp',
        'jumlah_bayar'
    ];
}
