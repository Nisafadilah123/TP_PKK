<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarung extends Model
{
    use HasFactory;
    protected $table = "data_warung";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_warung', 'komoditi', 'kategori', 'volume', 'periode'
    ];

    public function warung(){
        return $this->belongsTo(WarungPKK::class, 'id_warung');
    }

}