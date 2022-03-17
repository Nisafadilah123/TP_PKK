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
        Schema::create('penghayatan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_PKBN_simulasi');
            $table->integer('jml_PKBN_anggota');
            $table->integer('jml_PKDRT_simulasi');
            $table->integer('jml_PKDRT_anggota');
            $table->integer('jml_pola_asuh_simulasi');
            $table->integer('jml_pola_asuh_anggota');

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
        Schema::dropIfExists('penghayatan');
    }
};