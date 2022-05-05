<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatanPosyandu extends Model
{
    use HasFactory;
    protected $table = "data_jenis_kegiatan_posyandu";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_posyandu', 'jenis_kegiatan', 'frekuensi_layanan', 'periode', 'jumlah_pengunjung_laki', 'jumlah_pengunjung_perempuan', 'jumlah_petugas_laki',	'jumlah_petugas_perempuan',	'keterangan_lain'
    ];

    public function posyandu(){
        return $this->belongsTo(Posyandu::class, 'id_posyandu');
    }

}