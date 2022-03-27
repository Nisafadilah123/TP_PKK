<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahKaderDataUmum extends Model
{
    use HasFactory;
    protected $table = "jumlah_kader_data_umum";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_kader_anggota_pkk_laki',	'jml_kader_anggota_pkk_perempuan',	'jml_kader_umum_laki',	'jml_kader_umum_perempuan',
       	'jml_kader_khusus_laki', 'jml_kader_khusus_perempuan', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}