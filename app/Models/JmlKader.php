<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JmlKader extends Model
{
    use HasFactory;
    protected $table = "jml_kader";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_kader_PKBN', 'jml_kader_PKDRT', 'jml_kader_pola_asuh'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    public function jml_kader(){
        return $this->hasMany(JmlKader::class);
    }
}
