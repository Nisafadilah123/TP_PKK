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
        Schema::create('data_taman_bacaan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_taman_bacaan')->unsigned();
            $table->foreign('id_taman_bacaan')->references('id')->on('taman_bacaan');
            $table->string('jenis_buku');
            $table->string('kategori');
            $table->integer('jumlah');

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
        Schema::dropIfExists('data_taman_bacaan');
    }
};