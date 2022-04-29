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
            $table->bigInteger('id_kader')->unsigned();
            $table->foreign('id_kader')->references('id')->on('data_kader_gabung_pelatihan');
            $table->string('nama_pelatihan');
            $table->string('kriteria_kader');
            $table->integer('tahun');
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