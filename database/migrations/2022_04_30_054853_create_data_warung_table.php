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
        Schema::create('data_warung', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_warung')->unsigned();
            $table->foreign('id_warung')->references('id')->on('warung_pkk');
            $table->string('komoditi');
            $table->string('kategori');
            $table->integer('volume');
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
        Schema::dropIfExists('data_warung');
    }
};