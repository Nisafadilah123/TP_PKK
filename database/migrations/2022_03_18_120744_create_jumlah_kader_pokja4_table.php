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
        Schema::create('jumlah_kader_pokja4', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_kader_posyandu');
            $table->integer('jml_kader_gizi');
            $table->integer('jml_kader_kesling');
            $table->integer('jml_kader_penyuluhan_narkoba');
            $table->integer('jml_kader_PHBS');
            $table->integer('jml_kader_KB');

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
        Schema::dropIfExists('jumlah_kader_pokja4');
    }
};