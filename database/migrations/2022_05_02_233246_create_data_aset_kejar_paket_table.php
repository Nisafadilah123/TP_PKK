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
        Schema::create('data_aset_kejar_paket', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->foreign('id_kecamatan')->references('id')->on('data_kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('nama_kejar_paket');
            $table->string('jenis_paket');
            $table->string('jumlah_warga_laki');
            $table->string('jumlah_warga_perempuan');
            $table->string('jumlah_pengajar_laki');
            $table->string('jumlah_pengajar_perempuan');
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
        Schema::dropIfExists('data_aset_kejar_paket');
    }
};
