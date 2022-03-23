<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    protected $table = "kesehatan_posyandu";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_posyandu', 'jml_posyandu_terintegrasi', 'jml_posyandu_lansia_klp', 'jml_posyandu_lansia_anggota', 'jml_posyandu_lansia_memiliki_kartu'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
