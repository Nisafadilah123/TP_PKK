<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 5; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('data_kader')->insert([
    			'name' => $faker->name,
    			'email' => $faker->email,
    			'password' => $faker->password,
    		]);
    }
}
}
