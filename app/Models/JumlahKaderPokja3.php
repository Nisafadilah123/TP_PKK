<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahKaderPokja3 extends Model
{
    use HasFactory;
    protected $table = "jumlah_kader_pokja3";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_pangan', 'jml_sandang', 'jml_tata_laksana', 'periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }
}