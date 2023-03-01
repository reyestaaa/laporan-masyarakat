<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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


    public function destroy(string $id)
    {
        $kategori = Kategori::where('id_kategori', $id)->first();

        $kategori->delete();
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }

}
