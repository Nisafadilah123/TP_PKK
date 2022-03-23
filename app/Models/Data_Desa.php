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

    public function jml_kader(){
        return $this->hasMany(JmlKader::class);
    }

    public function gotong_royong(){
        return $this->hasMany(GotongRoyong::class);
    }
    public function jumlah_kader_pokja3(){
        return $this->hasMany(JumlahKaderPokja3::class);
    }

    public function jml_industri(){
        return $this->hasMany(JumlahIndustri::class);
    }

    public function jumlah_kader_pokja4(){
        return $this->hasMany(JumlahKaderPokja4::class);
    }
    public function jml_rumah(){
        return $this->hasMany(JumlahRumah::class);
    }

    public function pangan(){
        return $this->hasMany(Pangan::class);
    }
    public function kesehatan(){
        return $this->hasMany(Kesehatan::class);
    }

    public function pendidikan(){
        return $this->hasMany(Pendidikan::class);
    }

    public function koperasi(){
        return $this->hasMany(Koperasi::class);
    }

    public function kelestarian(){
        return $this->hasMany(Kelestarian::class);
    }

    public function perencanaan(){
        return $this->hasMany(PerencanaanSehat::class);
    }

    public function jml_kelompok(){
        return $this->hasMany(JumlahKelompok::class);
    }

    public function jml_data_umum(){
        return $this->hasMany(JumlahDataUmum::class);
    }

    public function jumlah_kader_data_umum(){
        return $this->hasMany(JumlahKaderDataUmum::class);
    }

    public function jumlah_jiwa_data_umum(){
        return $this->hasMany(JumlahJiwaDataUmum::class);
    }

    public function jumlah_tenaga_sekretariat(){
        return $this->hasMany(JumlahTenagaSekretariatDataUmum::class);
    }

}
