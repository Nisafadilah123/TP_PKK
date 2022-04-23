<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganKegiatan extends Model
{
    use HasFactory;
    protected $table = "katerangan_kegiatan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_kegiatan', 'nama_keterangan'
    ];

    public function kegiatan(){
        return $this->belongsTo(DataKegiatanWarga::class, 'id_kategori');
    }
}