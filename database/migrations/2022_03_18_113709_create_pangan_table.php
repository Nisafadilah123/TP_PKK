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
        Schema::create('pangan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_makanan_beras');
            $table->integer('jml_makanan_nonberas');
            $table->integer('jml_pemanfaatan_peternakan');
            $table->integer('jml_pemanfaatan_perikanan');
            $table->integer('jml_pemanfaatan_warung_hidup');
            $table->integer('jml_pemanfaatan_limbung_hidup');
            $table->integer('jml_pemanfaatan_toga');
            $table->integer('jml_pemanfaatan_tanaman_keras');

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
        Schema::dropIfExists('pangan');
    }
};