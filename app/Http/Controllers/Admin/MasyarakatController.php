<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Masyarakat.index', [
            'masyarakat' => Masyarakat::all()
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
    public function show($nik)
    {
        return view('Admin.Masyarakat.show', [
            'masyarakat' => Masyarakat::where('nik', $nik)->first()
        ]);
    }

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
    $data = $request->all();
    
    $validate = Validator::make($data, [
        'nik' => 'required|size:16|unique:masyarakats,nik,'.$nik.',nik',
        'nama' => 'required|max:35',
        'username' => 'required|max:25|unique:masyarakats,username,'.$nik.',nik',
        'password' => 'required|max:255',
        'telp' => 'required|max:15',
    ]);
    
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate);
    }
    
    $masyarakat = Masyarakat::find($nik);
    
    if (!$masyarakat) {
        return redirect()->back()->with([
            'message' => 'Data masyarakat tidak ditemukan'
        ]);
    }
    
    $masyarakat->nama = $data['nama'];
    $masyarakat->username = $data['username'];
    
    if (!empty($data['password'])) {
        $masyarakat->password = Hash::make($data['password']);
    }
    
    $masyarakat->telp = $data['telp'];
    $masyarakat->save();
    
    return redirect()->route('Admin.Masyarakat.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
