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
        Schema::create('data_jenis_kegiatan_posyandu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_posyandu')->unsigned();
            $table->foreign('id_posyandu')->references('id')->on('data_aset_posyandu');
            $table->string('jenis_kegiatan');
            $table->string('frekuensi_layanan');
            $table->integer('jumlah_pengunjung_laki');
            $table->integer('jumlah_pengunjung_perempuan');
            $table->integer('jumlah_petugas_laki');
            $table->integer('jumlah_petugas_perempuan');
            $table->string('keterangan_lain')->nullable();
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
        Schema::dropIfExists('data_jenis_kegiatan_posyandu');
    }
};