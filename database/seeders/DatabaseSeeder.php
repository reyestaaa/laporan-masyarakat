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
        //     'alamat' => 'Jalan raya tajur no.23',
        //     'telp' => '081028111',
        //     'email' => 'admin@gmail.com',
        //     'level' => 'admin'
        // ]);

        \App\Models\Petugas::create([
            'nama_petugas' => 'Petugasaaer',
            'username' => 'petugasaa',
            'password' => Hash::make('password'),
            'alamat' => 'Jalan raye Grogol',
            'telp' => '076233335432',
            'email' => 'petugasaa@gmail.com',
            'level' => 'petugasaa'
        ]);
    }
}
