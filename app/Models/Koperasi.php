<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;
    protected $table = "koperasi";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_pemula_klp', 'jml_pemula_peserta', 'jml_madya_klp', 'jml_madya_peserta', 'jml_utama_klp', 'jml_utama_peserta', 'jml_mandiri_klp', 'jml_mandiri_peserta',	'jml_koperasi_klp',
       	'jml_koperasi_peserta', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
