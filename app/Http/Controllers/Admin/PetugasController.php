<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Petugas.index', [
            'petugas' => Petugas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
{
    $data = $request->all();

    $validate = Validator::make($data, [
        'nama_petugas' => 'required|string|max:255',
        'username' => 'required|string|unique:petugas',
        'password' => 'required|string|min:6',
        'telp' => 'required',
        'level' => 'required|in:admin,petugas',
    ]);

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate);
    }

    if (Petugas::where('username', $data['username'])->exists()) {
        return redirect()->back()->with([
            'username' => 'Username sudah ada, harap ganti'
        ]);
    }

    Petugas::create([
        'nama_petugas' => $data['nama_petugas'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']), 
        'telp' => $data['telp'],
        'level' => $data['level'] 
    ]);

    return redirect()->route('petugas.index');
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
    public function edit(string $id_petugas)
    {
        return view('Admin.Petugas.edit', [
            'petugas' => Petugas::where('id_petugas', $id_petugas)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();
    
        $validate = Validator::make($data, [
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|unique:petugas,username,'.$id_petugas.',id_petugas',
            'password' => 'sometimes|string|min:6',
            'telp' => 'required',
            'level' => 'required|in:admin,petugas',
        ]);
    
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
    
        $petugas = Petugas::find($id_petugas);
    
        if (!$petugas) {
            return redirect()->back()->with([
                'message' => 'Data petugas tidak ditemukan'
            ]);
        }
    
        $petugas->nama_petugas = $data['nama_petugas'];
        $petugas->username = $data['username'];
    
        if (!empty($data['password'])) {
            $petugas->password = Hash::make($data['password']);
        }
    
        $petugas->telp = $data['telp'];
        $petugas->level = $data['level'];
        $petugas->save();
    
        return redirect()->route('petugas.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_petugas)
    {
        $petugas = Petugas::findOrFail($id_petugas);

        $petugas->delete();

        return redirect()->route('petugas.index');
    }
}
