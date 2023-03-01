<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        return view('Admin.Laporan.index', [
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to
        ]);
    }

    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

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
