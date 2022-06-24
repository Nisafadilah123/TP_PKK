<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $haveKegiatan
 * @property-read int $haveIndustri
 * @property-read int $havePemanfaatan
 * @property-read Collection<DataIndustriRumah> $industri
 * @property-read null|DataWarga $kepalaKeluarga
 * @property-read Collection<DataPemanfaatanPekarangan> $pemanfaatan
 */
class DataKeluarga extends Model
{
    use HasFactory;

    protected $table = "data_keluarga";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $fillable = [
    //    'id_desa','id_kecamatan', 'id_user','nama_kepala_rumah_tangga', 'nik_kepala_keluarga', 'dasa_wisma', 'kota', 'provinsi', 'rt', 'rw', 'jumlah_anggota_keluarga',
    //    'laki_laki', 'perempuan', 'jumlah_KK', 'jumlah_balita', 'jumlah_balita_laki', 'jumlah_balita_perempuan','jumlah_PUS', 'jumlah_WUS', 'jumlah_3_buta',
    //    'jumlah_3_buta_laki','jumlah_3_buta_perempuan', 'jumlah_ibu_hamil', 'jumlah_ibu_menyusui','jumlah_lansia', 'jumlah_kebutuhan', 'makanan_pokok', 'punya_jamban',
    //    'jumlah_jamban', 'sumber_air', 'punya_tempat_sampah', 'punya_saluran_air', 'tempel_stiker', 'kriteria_rumah', 'aktivitas_UP2K', 'aktivitas_kegiatan_usaha', 'periode'
    // ];

    public function getHaveKegiatanAttribute()
    {
        $have = 0;

        if ($kepalaKeluarga = $this->kepalaKeluarga) {
            if ($kepalaKeluarga->kegiatan->count() > 0) {
                $have = 1;
            }
        }

        return $have;
    }

    public function getHaveIndustriAttribute()
    {
        $have = 0;

        if ($this->industri->count() > 0) {
            $have = 1;
        }

        return $have;
    }

    public function getHavePemanfaatanAtribute()
    {
        $have = 0;

        if ($this->industri->count() > 0) {
            $have = 1;
        }

        return $have;
    }

    public function getKepalaKeluargaKegiatans()
    {
        /** @var Collection<DataKegiatanWarga> */
        $kegiatans = new Collection();

        if ($kepalaKeluarga = $this->kepalaKeluarga) {
            $kegiatans = $kepalaKeluarga->kegiatan;
        }

        return $kegiatans;
    }

    public function getRekap()
    {

    }

    public function kecamatan(){
        return $this->belongsTo(DataKecamatan::class, 'id_kecamatan');
    }

    public function kepalaKeluarga()
    {
        return $this->belongsTo(DataWarga::class, 'nik_kepala_keluarga', 'no_ktp');
    }

    public function desa(){
        return $this->belongsTo(Data_Desa::class, 'id_desa');
    }

    // public function warga(){
    //     return $this->belongsTo(DataWarga::class, 'id_warga');
    // }

    public function warga(){
        return $this->hasMany(DataWarga::class, 'id_keluarga');
    }

    // data_pemanfaatan
    public function pemanfaatan(){
        return $this->hasMany(DataPemanfaatanPekarangan::class, 'id_keluarga');
    }

     // data_pemanfaatan
     public function industri(){
        return $this->hasMany(DataIndustriRumah::class, 'id_keluarga');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}