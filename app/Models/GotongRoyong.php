<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GotongRoyong extends Model
{
    use HasFactory;
    protected $table = "gotong_royong";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_gotong_kerja_bakti', 'jml_gotong_rukun_kebaktian', 'jml_gotong_keagamaan', 'jml_gotong_jimpitan', 'jml_gotong_arisan','periode'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }
}