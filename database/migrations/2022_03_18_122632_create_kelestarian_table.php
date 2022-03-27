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
        Schema::create('kelestarian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_rumah_jamban');
            $table->integer('jml_rumah_spal');
            $table->integer('jml_rumah_tempat_sampah');
            $table->integer('jml_mck');
            $table->integer('jml_krt_pdam');
            $table->integer('jml_krt_sumur');
            $table->integer('jml_krt_lain');
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
        Schema::dropIfExists('kelestarian');
    }
};