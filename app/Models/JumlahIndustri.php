<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahIndustri extends Model
{
    use HasFactory;
    protected $table = "jumlah_industri";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_desa', 'jml_industri_pangan', 'jml_industri_sandang', 'jml_industri_jasa'
    ];

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }
}
