<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggotaKader extends Model
{
    use HasFactory;
    protected $table = "data_daftar_anggota_kader";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'provinsi', 'kota', 'no_registrasi', 'nama', 'jenis_kelamin', 'fungsi_keanggotaan', 'kader_umum',	'kader_khusus', 'tempat_lahir',
       'tgl_lahir',  'status', 'alamat', 'pendidikan', 'pekerjaan', 'umur', 'keterangan', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

}