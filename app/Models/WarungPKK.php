<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarungPKK extends Model
{
    use HasFactory;
    protected $table = "warung_pkk";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_warung', 'nama_pengelola',  'kota', 'provinsi'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

    public function data_warung(){
        return $this->hasMany(DataWarung::class);
    }

}