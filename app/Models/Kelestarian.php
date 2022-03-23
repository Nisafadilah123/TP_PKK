<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelestarian extends Model
{
    use HasFactory;
    protected $table = "kelestarian";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_rumah_jamban', 'jml_rumah_spal', 'jml_rumah_tempat_sampah', 'jml_mck', 'jml_krt_pdam', 'jml_krt_sumur', 'jml_krt_lain'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
