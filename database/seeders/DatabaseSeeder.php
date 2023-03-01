<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Petugas::create([
        //     'nama_petugas' => 'Administrator',
        //     'username' => 'admin',
        //     'password' => Hash::make('password'),
        //     'telp' => '081028111',
        //     'level' => 'admin'
        // ]);

        \App\Models\Petugas::create([
            'nama_petugas' => 'Petugaser',
            'username' => 'petugas',
            'password' => Hash::make('password'),
            'telp' => '081028111',
            'level' => 'petugas'
        ]);
    }
}
