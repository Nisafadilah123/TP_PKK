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
        Schema::table('data_keluarga', function (Blueprint $table) {
            $table->dropForeign('data_keluarga_id_desa_foreign');
            $table->dropColumn('id_desa');
            $table->dropColumn('nama_kepala_rumah_tangga');
            $table->dropColumn('nik_kepala_keluarga');
            $table->dropColumn('rt');
            $table->dropColumn('rw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_keluarga', function (Blueprint $table) {
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');
            $table->string('nama_kepala_rumah_tangga');
            $table->string('nik_kepala_keluarga');
            $table->integer('rt');
            $table->integer('rw');

        });
    }
};