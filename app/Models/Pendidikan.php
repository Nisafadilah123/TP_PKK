<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = "pendidikan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_warga_buta',	'jml_pktA_kel_belajar', 'jml_pktA_warga_belajar', 'jml_pktB_kel_belajar', 'jml_pktB_warga_belajar', 'jml_pktC_kel_belajar',	'jml_pktC_warga_belajar', 'jml_KF_kel_belajar',
       	'jml_KF_warga_belajar', 'jml_paud',	'jml_taman_bacaan', 'jml_BKB_kel_belajar', 'jml_BKB_ibu_peserta', 'jml_BKB_ape', 'jml_BKB_kel_simulasi', 'jml_kader_khusus_KF',	'jml_kader_khusus_paud_sejenis', 
           'jml_kader_khusus_BKB', 'jml_kader_khusus_koperasi',	'jml_kader_khusus_keterampilan', 'jml_kader_umum_LP3', 'jml_kader_umum_TPK', 'jml_kader_umum_damas', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
