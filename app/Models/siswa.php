<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table='siswas';

    public function spp(){
        return $this->hasOne(spp::class,'id');
    }

    public function kelas(){
        return $this->hasOne(kelas::class,'id');
    }

}
