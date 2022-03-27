<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangan extends Model
{
    use HasFactory;
    protected $table = "pangan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_makanan_beras', 'jml_makanan_nonberas', 'jml_pemanfaatan_peternakan', 'jml_pemanfaatan_perikanan', 'jml_pemanfaatan_warung_hidup', 'jml_pemanfaatan_limbung_hidup', 'jml_pemanfaatan_toga',
        'jml_pemanfaatan_tanaman_keras','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
