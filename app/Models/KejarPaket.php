<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejarPaket extends Model
{
    use HasFactory;
    protected $table = "data_aset_kejar_paket";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'id_kecamatan', 'nama_kejar_paket', 'jenis_paket', 'jumlah_warga_laki', 'jumlah_warga_perempuan', 'jumlah_pengajar_laki', 'jumlah_pengajar_perempuan',  'kota', 'provinsi','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

}