<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahRumah extends Model
{
    use HasFactory;
    protected $table = "jumlah_rumah";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_rumah_sehat', 'jml_rumah_kurang_sehat'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

}
