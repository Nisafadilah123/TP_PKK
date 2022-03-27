<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahDataUmum extends Model
{
    use HasFactory;
    protected $table = "jumlah_data_umum";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_krt_data_umum', 'jml_kk_data_umum', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}