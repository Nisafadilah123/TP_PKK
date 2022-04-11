<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'nama_kegiatan'
    ];

    public function warga(){
        return $this->belongsTo(DataWarga::class, 'id_warga');
    }

    public function kegiatan(){
        return $this->hasMany(DataKegiatanWarga::class);
    }


}
