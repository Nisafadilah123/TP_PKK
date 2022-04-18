<?php

use App\Models\DataWarga;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->foreign('id_kecamatan')->references('id')->on('data_kecamatan');
            $table->bigInteger('id_data_warga')->unsigned();
            $table->foreign('id_data_warga')->references('id')->on('data_warga');
            $table->string('dasa_wisma');
            $table->string('nama_kepala_rumah_tangga');
            $table->integer('jumlah_anggota_keluarga');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kota');
            $table->integer('provinsi');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('jumlah_KK');
            $table->string('kategori_anggota');
            $table->integer('jumlah_kategori_anggota')->nullable();
            $table->string('makanan_pokok');
            $table->string('punya_jamban');
            $table->integer('jumlah_jamban');
            $table->string('sumber_air');
            $table->string('punya_tempat_sampah');
            $table->string('punya_saluran_air');
            $table->string('tempel_stiker');
            $table->string('kriteria_rumah');
            $table->string('aktivitas_UP2K');
            $table->string('aktivitas_kegiatan_usaha');
            $table->integer('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_keluarga');
    }
};
