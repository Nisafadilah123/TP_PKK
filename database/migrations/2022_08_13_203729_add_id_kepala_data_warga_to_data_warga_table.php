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
            $table->bigInteger('id_kepala_data_warga')->nullable()->after('id_keluarga');
            $table->bigInteger('id_keluarga')->unsigned()->nullable()->change();
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
            $table->dropColumn('id_kepala_data_warga');
        });
    }
};