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
        Schema::create('kesehatan_posyandu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_posyandu');
            $table->integer('jml_posyandu_terintegrasi');
            $table->integer('jml_posyandu_lansia_klp');
            $table->integer('jml_posyandu_lansia_anggota');
            $table->integer('jml_posyandu_lansia_memiliki_kartu');

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
        Schema::dropIfExists('kesehatan_posyandu');
    }
};