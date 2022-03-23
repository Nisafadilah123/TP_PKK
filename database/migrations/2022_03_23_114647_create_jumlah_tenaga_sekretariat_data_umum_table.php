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
        Schema::create('jumlah_tenaga_sekretariat_data_umum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_tenaga_honorer_laki');
            $table->integer('jml_tenaga_honorer_perempuan');
            $table->integer('jml_tenaga_bantuan_laki');
            $table->integer('jml_tenaga_bantuan_perempuan');

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
        Schema::dropIfExists('jumlah_tenaga_sekretariat_data_umum');
    }
};
