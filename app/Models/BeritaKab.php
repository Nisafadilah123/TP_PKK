<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKab extends Model
{
    use HasFactory;
    protected $table = "berita_kab";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_berita', 'desk', 'gambar', 'tgl_publish', 'penulis'
    ];

}
