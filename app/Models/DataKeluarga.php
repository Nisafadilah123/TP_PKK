<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;
    protected $table = "data_keluarga";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa','id_kecamatan', 'data_warga_id', 'nama_kepala_rumah_tangga', 'jumlah_anggota_keluarga', 'laki_laki', 'perempuan', 'jumlah_KK', 'kategori_anggota',
       'jumlah_kategori_anggota', 'makanan_pokok', 'punya_jamban', 'jumlah_jamban', 'sumber_air', 'punya_tempat_sampah', 'punya_saluran_air', 'tempel_stiker',
       'kriteria_rumah', 'aktivitas_UP2K', 'aktivitas_kegiatan_usaha', 'periode'
    ];

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }
    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function warga(){
        return $this->belongsTo(DataWarga::class, 'data_warga_id');
    }

}