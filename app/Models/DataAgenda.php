<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAgenda extends Model
{
    use HasFactory;
    protected $table = "data_agenda_kegiatan";
    protected $primaryKey = 'id';

    protected $fillable = [
       'judul_agenda', 'tema', 'tempat', 'tgl_publish', 'pukul'
    ];

}