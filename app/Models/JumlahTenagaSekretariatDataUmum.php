<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahTenagaSekretariatDataUmum extends Model
{
    use HasFactory;
    protected $table = "jumlah_kelompok";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_jiwa_data_umum_laki', 'jml_jiwa_data_umum_perempuan'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}