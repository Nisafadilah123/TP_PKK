<?php

namespace App\Models;

use App\Entities\RW;
use Illuminate\Support\Collection;

class DataRW
{
    /**
     * @param int $id_desa
     * @param int $rw
     * @param int $rt
     * @param string $dasa_wisma
     * @param string $dusun
     * @param int $periode
     * @return Collection<RW> $rws
     */
    public static function getRW($id_desa, $dusun,$rw, $rt, $periode)
    {
        /** @var Collection<RW> */
        $result = new Collection();

        /** @var Collection<string, Collection<DataKeluarga>> */
        $rws = DataKeluarga::query()
                ->with(['industri', 'pemanfaatan'])
                ->whereHas('kepala_keluarga', function ($q) use ($id_desa) {
                    $q->where('id_desa', $id_desa);
                })
                ->where('dusun', $dusun)
                ->where('periode', $periode)
                ->get()
                ->groupBy('kepala_keluarga.rw');
            // dd($rws);
        foreach ($rws as $keluargas) {

            $keluarga = $keluargas->first();

                $rw = new RW();
                $rw->id = $keluarga->id;
                $rw->id_kecamatan = $keluarga->kepala_keluarga->desa->id_kecamatan ?? null;
                $rw->id_desa = $keluarga->kepala_keluarga->id_desa ?? null;
                $rw->dusun = $keluarga->dusun;
                $rw->rw = $keluarga->kepala_keluarga->rw ?? null;
                $rw->nama = $keluarga->nama;
                $rt =  $keluargas->groupBy(function ($item) {
                    return strtolower($item->rt);
                });
                $dasa_wisma = $keluargas->groupBy(function ($item) {
                    return strtolower($item->dasa_wisma);
                });
                $rw->jumlah_rt = count($rt);

                $rw->jumlah_dasa_wisma = count($dasa_wisma);
                $rw->jumlah_KRT = $keluargas->count('id');
                $rw->jumlah_KK = $keluargas->sum('jumlah_KK');
                $rw->jumlah_laki_laki = $keluargas->sum('jumlah_laki');
                $rw->jumlah_perempuan = $keluargas->sum('jumlah_perempuan');
                $rw->jumlah_balita_laki = $keluargas->sum('jumlah_balita_laki');
                $rw->jumlah_balita_perempuan = $keluargas->sum('jumlah_balita_perempuan');
                $rw->jumlah_3_buta_laki = $keluargas->sum('jumlah_3_buta_laki');
                $rw->jumlah_3_buta_perempuan = $keluargas->sum('jumlah_3_buta_perempuan');
                $rw->jumlah_PUS = $keluargas->sum('jumlah_PUS');
                $rw->jumlah_WUS = $keluargas->sum('jumlah_WUS');
                $rw->jumlah_ibu_hamil = $keluargas->sum('jumlah_ibu_hamil');
                $rw->jumlah_ibu_menyusui = $keluargas->sum('jumlah_ibu_menyusui');
                $rw->jumlah_lansia = $keluargas->sum('jumlah_lansia');
                $rw->jumlah_kebutuhan_khusus = $keluargas->sum('jumlah_kebutuhan_khusus');
                $rw->jumlah_kriteria_rumah_sehat = $keluargas->sum('kriteria_rumah');
                $rw->jumlah_kriteria_rumah_tidak_sehat = $keluargas->count() - $keluargas->sum('kriteria_rumah');
                $rw->jumlah_punya_tempat_sampah = $keluargas->sum('punya_tempat_sampah');
                $rw->jumlah_punya_saluran_air = $keluargas->sum('punya_saluran_air');
                $rw->jumlah_tempel_stiker = $keluargas->sum('tempel_stiker');
                $rw->jumlah_sumber_air_pdam = $keluargas->where('sumber_air', 1)->count();
                $rw->jumlah_sumber_air_sumur = $keluargas->where('sumber_air', 2)->count();
                $rw->jumlah_sumber_air_sungai = $keluargas->where('sumber_air', 3)->count();
                $rw->jumlah_sumber_air_dll = $keluargas->where('sumber_air', 4)->count();
                $rw->punya_jamban = $keluargas->sum('punya_jamban');
                $rw->jumlah_makanan_pokok_beras = $keluargas->where('makanan_pokok', 1)->count();
                $rw->jumlah_makanan_pokok_non_beras = $keluargas->where('makanan_pokok', 0)->count();
                $rw->jumlah_aktivitas_UP2K = $keluargas->sum('aktivitas_UP2K');
                $rw->jumlah_have_pemanfaatan = $keluargas->sum('have_pemanfaatan');
                $rw->jumlah_have_industri = $keluargas->sum('have_industri');
                $rw->jumlah_have_kegiatan = $keluargas->sum('have_kegiatan');

                $result->push($rw);

        }

        return $result;
    }
}