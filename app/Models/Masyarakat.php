<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticateble;

class Masyarakat extends Authenticateble
{
    use HasFactory;
    
    protected $table = 'masyarakats';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp'
    ];
}
