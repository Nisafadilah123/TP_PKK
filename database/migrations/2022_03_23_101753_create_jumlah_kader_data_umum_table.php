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
        Schema::create('jumlah_kader_data_umum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_kader_anggota_pkk_laki');
            $table->integer('jml_kader_anggota_pkk_perempuan');
            $table->integer('jml_kader_umum_laki');
            $table->integer('jml_kader_umum_perempuan');
            $table->integer('jml_kader_khusus_laki');
            $table->integer('jml_kader_khusus_perempuan');

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
        Schema::dropIfExists('jumlah_kader_data_umum');
    }
};