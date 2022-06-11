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
       'id_desa','id_kecamatan', 'id_user','nama_kepala_rumah_tangga', 'nik_kepala_keluarga', 'dasa_wisma', 'kota', 'provinsi', 'rt', 'rw', 'jumlah_anggota_keluarga', 'laki_laki', 'perempuan', 'jumlah_KK', 'jumlah_balita',
       'jumlah_balita_laki', 'jumlah_balita_perempuan','jumlah_PUS', 'jumlah_WUS', 'jumlah_3_buta','jumlah_3_buta_laki','jumlah_3_buta_perempuan', 'jumlah_ibu_hamil',
       'jumlah_ibu_menyusui','jumlah_lansia', 'jumlah_kebutuhan', 'makanan_pokok', 'punya_jamban', 'jumlah_jamban', 'sumber_air', 'punya_tempat_sampah', 'punya_saluran_air',
       'tempel_stiker', 'kriteria_rumah', 'aktivitas_UP2K', 'aktivitas_kegiatan_usaha', 'periode'
    ];

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }
    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    // public function warga(){
    //     return $this->belongsTo(DataWarga::class, 'id_warga');
    // }

    public function warga(){
        return $this->hasMany(DataWarga::class);
    }

    // data_pemanfaatan
    public function pemanfaatan(){
        return $this->hasMany(DataPemanfaatanPekarangan::class);
    }

     // data_pemanfaatan
     public function industri(){
        return $this->hasMany(DataIndustriRumah::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}