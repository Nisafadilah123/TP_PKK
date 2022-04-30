<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamanBacaan extends Model
{
    use HasFactory;
    protected $table = "taman_bacaan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_taman_bacaan', 'nama_pengelola',  'kota', 'provinsi', 'jumlah_buku'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

    public function data_taman_bacaan(){
        return $this->hasMany(DataTamanBacaan::class);
    }

}
