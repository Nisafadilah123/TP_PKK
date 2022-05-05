<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;
    protected $table = "data_aset_posyandu";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_posyandu', 'pengelola',  'kota', 'provinsi', 'sekretaris', 'jumlah_kader', 'jenis_posyandu'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

    public function jenis_kegiatan_posyandu(){
        return $this->hasMany(JenisKegiatanPosyandu::class);
    }

}
