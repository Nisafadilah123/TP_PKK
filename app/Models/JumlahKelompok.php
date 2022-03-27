<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahKelompok extends Model
{
    use HasFactory;
    protected $table = "jumlah_kelompok";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_pkk_dusun', 'jml_pkk_rw', 'jml_pkk_rt', 'jml_dasawisma','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}