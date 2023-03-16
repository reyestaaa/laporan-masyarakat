<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Petugas;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Laporan.index', [
            'kategori' => Kategori::all(),
            'petugas' => Petugas::all(),
        ]);
        
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';
    
        $status = $request->status;
        $kategori = Kategori::all();
        $petugas = Petugas::all();
    
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to]);
    
        if ($status !== null) {
            $pengaduan->where('status', $status);
        }
    
        $kategori_id = $request->kategori;
        if ($kategori_id) {
            $pengaduan->where('id_kategori', $kategori_id);
        }
        $petugas_id = $request->petugas;
        if ($petugas_id) {
            $pengaduan->where('id_petugas', $petugas_id);
        }
    
        $pengaduan = $pengaduan->get();
    
        return view('Admin.Laporan.index', [
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to,
            'status' => $status,
            'kategori' => $kategori,
            'petugas' => $petugas
        ]);
    }
    
    public function cetakLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';
    
        $status = $request->status;
        $kategori = $request->kategori;
        $petugas = $request->petugas;
    
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to]);
    
        if ($status !== null) {
            $pengaduan->where('status', $status);
        }
    
        if ($kategori !== null) {
            $pengaduan->where('id_kategori', $kategori);
        }
        if ($petugas !== null) {
            $pengaduan->where('id_petugas', $petugas);
        }
    
        $pengaduan = $pengaduan->get();
    
        $pdf = Pdf::loadView('Admin.Laporan.create', [
            'pengaduan' => $pengaduan
        ]);
    
        return $pdf->download('laporan.pdf');
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
