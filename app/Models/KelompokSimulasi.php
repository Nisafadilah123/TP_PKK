<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokSimulasi extends Model
{
    use HasFactory;
    protected $table = "kelompok_simulasi";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_kegiatan', 'jenis_simulasi', 'jumlah_kelompok', 'jumlah_sosialisasi', 'jumlah_kader_laki', 'jumlah_kader_perempuan', 'kota', 'provinsi', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

}
