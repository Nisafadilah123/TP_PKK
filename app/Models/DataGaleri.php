<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGaleri extends Model
{
    use HasFactory;
    protected $table = "data_galeri_kegiatan";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_gambar', 'nama_kegiatan', 'gambar', 'tgl_publish', 'pengirim'
    ];
}