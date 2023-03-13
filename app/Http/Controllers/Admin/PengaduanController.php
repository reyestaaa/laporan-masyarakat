<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Pengaduan.index', [
            'pengaduan' => Pengaduan::orderBy('tgl_pengaduan', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pengaduan)
    {
        return view('Admin.Pengaduan.show', [
            'pengaduan' => Pengaduan::where('id_pengaduan', $id_pengaduan)->first(),
            'tenggapan' => Tanggapan::where('id_pengaduan', $id_pengaduan)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data pada tabel `tanggapan` yang terikat dengan data yang ingin dihapus pada tabel `pengaduan`
        Tanggapan::where('id_pengaduan', $id)->delete();
    
        // menghapus data pada tabel `pengaduan`
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->delete();
    
        if ($pengaduan) {
            return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Pengaduan gagal dihapus');
        }
    }
    
    
    
    
    
}
