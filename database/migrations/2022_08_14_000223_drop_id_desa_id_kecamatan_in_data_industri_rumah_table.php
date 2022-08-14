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
        Schema::table('data_industri_rumah', function (Blueprint $table) {
            $table->dropForeign('data_industri_rumah_id_desa_foreign');
            $table->dropColumn('id_desa');
            $table->dropForeign('data_industri_rumah_id_kecamatan_foreign');
            $table->dropColumn('id_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_industri_rumah', function (Blueprint $table) {
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->foreign('id_kecamatan')->references('id')->on('data_kecamatan');
        });
    }
};
