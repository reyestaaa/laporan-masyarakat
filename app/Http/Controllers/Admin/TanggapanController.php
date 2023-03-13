<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function creupd(Request $request)
     {

        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        $pengaduan->update(['status' => $request->status]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        } else {
            $data['foto'] = '';
        }
        date_default_timezone_set('Asia/Bangkok');

        $tanggapan = Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d H:i:s'),
            'tanggapan' => $request->tanggapan,
            'foto' => $data['foto'],
            'id_petugas' => Auth::guard('admin')->user()->id_petugas,
        ]);
        
        return redirect()->route('pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ])->with(['status' => 'Berhasi Dikirim']); 

     }

    public function index()
    {
        
    }

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
