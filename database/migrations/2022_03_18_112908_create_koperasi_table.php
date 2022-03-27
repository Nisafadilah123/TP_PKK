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
        Schema::create('koperasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_pemula_klp');
            $table->integer('jml_pemula_peserta');
            $table->integer('jml_madya_klp');
            $table->integer('jml_madya_peserta');
            $table->integer('jml_utama_klp');
            $table->integer('jml_utama_peserta');
            $table->integer('jml_mandiri_klp');
            $table->integer('jml_mandiri_peserta');
            $table->integer('jml_koperasi_klp');
            $table->integer('jml_koperasi_peserta');
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
        Schema::dropIfExists('koperasi');
    }
};
