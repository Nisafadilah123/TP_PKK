<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghayatan extends Model
{
    use HasFactory;
    protected $table = "penghayatan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_PKBN_simulasi', 'jml_PKBN_anggota', 'jml_PKDRT_simulasi', 'jml_PKDRT_anggota', 'jml_pola_asuh_simulasi', 'jml_pola_asuh_anggota'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}