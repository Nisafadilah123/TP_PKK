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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');

            $table->integer('jml_warga_buta');
            $table->integer('jml_pktA_kel_belajar');
            $table->integer('jml_pktA_warga_belajar');
            $table->integer('jml_pktB_kel_belajar');
            $table->integer('jml_pktB_warga_belajar');
            $table->integer('jml_pktC_kel_belajar');
            $table->integer('jml_pktC_warga_belajar');
            $table->integer('jml_KF_kel_belajar');
            $table->integer('jml_KF_warga_belajar');
            $table->integer('jml_paud');
            $table->integer('jml_taman_bacaan');
            $table->integer('jml_BKB_kel_belajar');
            $table->integer('jml_BKB_ibu_peserta');
            $table->integer('jml_BKB_ape');
            $table->integer('jml_BKB_kel_simulasi');
            $table->integer('jml_kader_khusus_KF');
            $table->integer('jml_kader_khusus_paud_sejenis');
            $table->integer('jml_kader_khusus_BKB');
            $table->integer('jml_kader_khusus_koperasi');
            $table->integer('jml_kader_khusus_keterampilan');
            $table->integer('jml_kader_umum_LP3');
            $table->integer('jml_kader_umum_TPK');
            $table->integer('jml_kader_umum_damas');

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
        Schema::dropIfExists('pendidikan');
    }
};