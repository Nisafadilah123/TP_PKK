<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahKaderPokja4 extends Model
{
    use HasFactory;
    protected $table = "jumlah_kader_pokja4";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_kader_posyandu', 'jml_kader_gizi', 'jml_kader_kesling', 'jml_kader_penyuluhan_narkoba', 'jml_kader_PHBS', 'jml_kader_KB','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}