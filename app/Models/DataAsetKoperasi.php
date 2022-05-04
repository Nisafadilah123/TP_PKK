<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsetKoperasi extends Model
{
    use HasFactory;
    protected $table = "data_aset_koperasi";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_koperasi', 'jenis_koperasi','status_hukum', 'jumlah_anggota_laki', 'jumlah_anggota_perempuan','kota','provinsi', 'periode'
    ];

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }
    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }
}