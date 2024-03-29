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
        Schema::table('data_warga', function (Blueprint $table) {
            $table->integer('rw')->unsigned()->nullable()->after('alamat');
            $table->integer('rt')->unsigned()->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_warga', function (Blueprint $table) {
            $table->dropColumn('rt');
            $table->dropColumn('rw');
        });
    }
};