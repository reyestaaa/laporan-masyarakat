<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class KategoriController extends Controller
{
    public function index ()
    {
        return view('Admin.Kategori.index', [
            'kategori' => Kategori::all()
        ]);
    }

    public function create()
    {
        return view('Admin.Kategori.create');
    }

    public function store(Request $request)
    {
        Kategori::insert([
            'kategori' => $request->kategori,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambah!');
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);

        return view('Admin.Kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);

        $kategori->kategori = $request->kategori;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diupdate!');
    }



// Controller
public function destroy($id_kategori)
{
    try {
        $kategori = Kategori::findOrFail($id_kategori);

        if (!$kategori) {
            return redirect()->back()->with([
                'error' => 'Data kategori tidak ditemukan'
            ]);
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with([
            'success' => 'Data kategori berhasil dihapus'
        ]);
    } 
    catch (QueryException $e) {
        return redirect()->back()->with([
            'error' => 'Tidak dapat menghapus data kategori karena ada pengaduan yang terkait dengan kategori ini'
        ]);
    }
}


}
