<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIndustriRumah extends Model
{
    use HasFactory;
    protected $table = "industri_rumah";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_desa','id_kecamatan', 'id_warga', 'id_kategori', 'komoditi', 'volume', 'periode'
    ];

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }
    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }
    public function warga(){
        return $this->belongsTo(DataWarga::class, 'id_warga');
    }

    public function kategori_industri(){
        return $this->belongsTo(KategoriIndustriRumah::class, 'id_kategori');
    }
}