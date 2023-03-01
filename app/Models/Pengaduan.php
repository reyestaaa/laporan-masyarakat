<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
        
    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'id_kategori',
        'lokasi',
        'judul',
        'foto',
        'status'
    ];

    protected $dates = ['tgl_pengaduan'];

    
    protected $casts = [
        'tgl_pengaduan' => 'datetime',
        'tgl_tanggapan' => 'datetime',
    ];
    
    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'nik', 'nik');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
