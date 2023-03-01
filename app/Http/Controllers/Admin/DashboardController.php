<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $petugas = Petugas::all()->count();
        $masyarakat = Masyarakat::all()->count();
        $proses = Pengaduan::where('status', 'proses')->get()->count();
        $selesai = Pengaduan::where('status', 'selesai')->get()->count();
        $pengaduan = Pengaduan::where('status', '0')->get();
        $foto = Pengaduan::where('status', 'selesai')->get();
        $prosest = Pengaduan::where('status', 'proses')->get();
        
        return view('Admin.dashboard.index', [
            'petugas' => $petugas,
            'masyarakat' => $masyarakat,
            'proses' => $proses,
            'selesai' => $selesai,
            'pengaduan' => $pengaduan,
            'foto' => $foto,
            'prosest' => $prosest
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
