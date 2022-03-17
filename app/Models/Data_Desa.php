<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Desa extends Model
{
    use HasFactory;
    protected $table = "data_desa";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_kecamatan', 'kode_desa', 'nama_desa'
    ];

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

    public function penghayatan(){
        return $this->hasMany(Penghayatan::class);
    }
}