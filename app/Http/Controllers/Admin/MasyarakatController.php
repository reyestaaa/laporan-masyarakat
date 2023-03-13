<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\MasyarakatImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class MasyarakatController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Masyarakat.index', [
            'masyarakat' => Masyarakat::latest()->get()
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
    // public function show($nik)
    // {
    //     return view('Admin.Masyarakat.show', [
    //         'masyarakat' => Masyarakat::where('nik', $nik)->first()
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nik)
    {
        $masyarakat = Masyarakat::find($nik);
        return view('Admin.Masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nik)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:masyarakats,username,'.$nik.',nik',
            'password' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $masyarakat = Masyarakat::find($nik);
        $masyarakat->update($validated);

        return redirect()->route('masyarakat.index')
            ->with('success', 'Data berhasil diupdate.');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
    
        // Validasi file Excel
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    
        // Import data dari file Excel
        try {
            Excel::import(new MasyarakatImport, $file);
    
            return redirect()->back()->with('success', 'Data berhasil diimport!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
    
            return redirect()->back()->withErrors($failures);
        }
    }
    
    public function export()
    {
        $data = Masyarakat::all();

        $pdf = Pdf::loadView('Admin.Masyarakat.export', [
            'data' => $data
        ]);
        return $pdf->download('laporan-masyarakat.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $masyarakat = Masyarakat::find($id);
    
        if (!$masyarakat) {
            return redirect()->back()->with([
                'error' => 'Data masyarakat tidak ditemukan'
            ]);
        }
    
        $masyarakat->delete();
    
        return redirect()->route('masyarakat.index')->with([
            'success' => 'Data masyarakat berhasil dihapus'
        ]);
    }
}
