<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanSehat extends Model
{
    use HasFactory;
    protected $table = "perencanaan_sehat";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_PUS', 'jml_WUS',	'jml_anggota_akseptor_laki', 'jml_anggota_akseptor_perempuan', 'jml_kk_tabungan','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
