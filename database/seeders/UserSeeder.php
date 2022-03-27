<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin@gmail.com'),
            'user_type' => 'superadmin',
            'id_kecamatan' => null,
            'id_desa' => null,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Anjatan',
            'email' => 'admindesaanjatan@gmail.com',
            'password' => Hash::make('admindesaanjatan@gmail.com'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 1,
            'id_desa' => 1,
        ]);
        User::create([
            'name' => 'Admin PKK Kecamatan Arahan',
            'email' => 'adminkecamatananjatan@gmail.com',
            'password' => Hash::make('adminkecamatananjatan@gmail.com'),
            'user_type' => 'admin_kecamatan',
            'id_kecamatan' => 1,
            'id_desa' => null,
        ]);
        User::create([
            'name' => 'Admin PKK Desa Arahan',
            'email' => 'admindesaarahan@gmail.com',
            'password' => Hash::make('admindesaarahan@gmail.com'),
            'user_type' => 'admin_desa',
            'id_kecamatan' => 2,
            'id_desa' => 14,
        ]);
        User::create([
            'name' => 'Admin PKK Kecamatan Anjatan',
            'email' => 'adminkecamatanarahan@gmail.com',
            'password' => Hash::make('adminkecamatanarahan@gmail.com'),
            'user_type' => 'admin_kecamatan',
            'id_kecamatan' => 2,
            'id_desa' => null,
        ]);
        User::create([
            'name' => 'Admin PKK Kabupaten',
            'email' => 'adminkabupaten@gmail.com',
            'password' => Hash::make('adminkabupaten@gmail.com'),
            'user_type' => 'admin_kabupaten',
            'id_kecamatan' => null,
            'id_desa' => null,
        ]);
    }
}