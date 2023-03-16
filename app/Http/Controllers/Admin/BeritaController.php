<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        return view('Admin.berita.index', [
            'berita' =>  Berita::with('kategori')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    public function indexx()
    {
        return view('User.berita', [
            'berita' =>  Berita::with('kategori')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('Admin.berita.create', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'isi_berita' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image')->store('assets/berita', 'public');

        Berita::create([
            'judul' => $validatedData['judul'],
            'id_kategori' => $validatedData['id_kategori'],
            'isi_berita' => $validatedData['isi_berita'],
            'image' => $image,
            'id_petugas' => Auth::guard('admin')->user()->id_petugas,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        return view('User.berita', compact('berita'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita= Berita::find($id);
        $kategori = Kategori::all();
        return view('Admin.berita.edit', [
            'berita' => $berita,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'judul' => 'required|max:255',
             'id_kategori' => 'required|exists:kategori,id_kategori',
             'isi_berita' => 'required',
             'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         ]);
     
         $berita = Berita::findOrFail($id);
         $berita->judul = $validatedData['judul'];
         $berita->id_kategori = $validatedData['id_kategori'];
         $berita->isi_berita = $validatedData['isi_berita'];
     
         if ($request->hasFile('image')) {
             Storage::disk('public')->delete($berita->image);
     
             $image = $request->file('image')->store('assets/berita', 'public');
             $berita->image = $image;
         }
     
         $berita->save();
     
         return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
     }
     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $berita = Berita::find($id);
    
        if (!$berita) {
            return redirect()->back()->with([
                'error' => 'Data petugas tidak ditemukan'
            ]);
        }
    
        $berita->delete();
    
        return redirect()->route('berita.index')->with([
            'success' => 'Data berita berhasil dihapus'
        ]);
    }
}
