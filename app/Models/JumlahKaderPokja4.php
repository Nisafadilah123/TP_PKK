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
       'id_desa', 'jml_posyandu', 'jml_gizi', 'jml_kesling', 'jml_penyuluhan_narkoba', 'jml_PHBS', 'jml_KB','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}