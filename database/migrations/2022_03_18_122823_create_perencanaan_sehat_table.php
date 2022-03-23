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
        Schema::create('perencanaan_sehat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_PUS');
            $table->integer('jml_WUS');
            $table->integer('jml_anggota_akseptor_laki');
            $table->integer('jml_anggota_akseptor_perempuan');
            $table->integer('jml_kk_tabungan');

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
        Schema::dropIfExists('perencanaan_sehat');
    }
};
