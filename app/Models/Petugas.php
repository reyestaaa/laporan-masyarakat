<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticateble;

class Petugas extends Authenticateble
{
    use HasFactory;

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];

    // public function isAdmin()
    // {
    //     return $this->level === 'admin';
    // }

}
