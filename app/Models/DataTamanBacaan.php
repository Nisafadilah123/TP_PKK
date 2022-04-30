<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTamanBacaan extends Model
{
    use HasFactory;
    protected $table = "data_taman_bacaan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_taman_bacaan', 'jenis_buku', 'kategori', 'jumlah'
    ];

    public function taman_bacaan(){
        return $this->belongsTo(TamanBacaan::class, 'id_taman_bacaan');
    }

}