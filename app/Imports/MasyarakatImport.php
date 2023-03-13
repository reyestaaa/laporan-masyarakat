<?php

namespace App\Imports;

use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasyarakatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Masyarakat([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'username' => $row['username'],
            'password' => Hash::make($row['password']),
            'alamat' => $row['alamat'],
            'telp' => $row['telp']
        ]);
    }
}
