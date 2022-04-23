<?php

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
        Schema::create('data_pelatihan_kader', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa')->onUpdate('cascade');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->foreign('id_kecamatan')->references('id')->on('data_kecamatan')->onUpdate('cascade');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('no_registrasi');
            $table->string('nama');
            $table->date('tgl_masuk');
            $table->string('kedudukan');
            $table->string('pelatihan_yang_diikuti');
            $table->string('nama_pelatihan');
            $table->string('kriteria_kader');
            $table->string('tahun');
            $table->string('penyelenggara');
            $table->string('keterangan');

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
        Schema::dropIfExists('data_pelatihan_kader');
    }
};