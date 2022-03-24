<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahTenagaSekretariatDataUmum extends Model
{
    use HasFactory;
    protected $table = "jumlah_tenaga_sekretariat_data_umum";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_tenaga_honorer_laki', 'jml_tenaga_honorer_perempuan', 'jml_tenaga_bantuan_laki', 'jml_tenaga_bantuan_perempuan'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}