<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.landing', [
            'kategori' => Kategori::all()
        ]);
    }

    public function login(Request $request)
    {
        $username = Masyarakat::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with(['loginb' => 'Selamat and telah login']);
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nik' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Masyarakat::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('pekat.index')->with(['berhasil' => 'Anda berhasil registrasi, silahkan anda login']);
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();

        return redirect('/');
    }

    public function storePengaduan(Request $request)
    {
        if (!Auth::guard('masyarakat')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
            'judul' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan' => $data['isi_laporan'],
            'id_kategori' => $data['id_kategori'],
            'lokasi' => $data['lokasi'],
            'judul' => $data['judul'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        if ($pengaduan) {
            return redirect()->route('pekat.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {
        $terverifikasi = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();
        $kategori = Kategori::all();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($siapa == 'me') {
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.laporan', [
                'pengaduan' => $pengaduan,
                'hitung' => $hitung,
                'siapa' => $siapa,
                'kategori' => $kategori
            ]);
        } else {
            $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.laporan', [
                'pengaduan' => $pengaduan,
                'hitung' => $hitung,
                'siapa' => $siapa,
                'kategori' => $kategori
            ]);
        }
    }
}
