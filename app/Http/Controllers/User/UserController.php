<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {

        return view('user.landing', [
            'kategori' => Kategori::all(),
            'selesai' => Pengaduan::where('status', 'selesai')->limit(3)->get(),
            'pengaduan' => Pengaduan::all()->count(),
            
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
            'alamat' => ['required'],
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
            'alamat' => $data['alamat'],
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

        $nik = Auth::guard('masyarakat')->user()->nik;
        $count = Pengaduan::where('nik', $nik)
                    ->whereDate('tgl_pengaduan', Carbon::today())
                    ->count();
        

        // jika user telah mengirim 3 post, tampilkan pesan error
        if ($count >= 3) {
            return redirect()->back()->with('error', 'Maaf, Anda telah mencapai batas maksimal pengiriman post hari ini');
        }
        

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
            'judul' => ['required'],
            'id_kategori' => ['required'],
            'lokasi' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => Carbon::now(),
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
        $selesai1 = Pengaduan::where('status', 'selesai')->limit(3)->get();

        $hitung = [$terverifikasi, $proses, $selesai];

        $jumlah_pengaduan = Pengaduan::join('kategori', 'pengaduan.id_kategori', '=', 'kategori.id_kategori')
        ->select('kategori.kategori', DB::raw('COUNT(*) as jumlah_pengaduan'))
        ->groupBy('kategori.kategori')
        ->orderByDesc('jumlah_pengaduan')
        ->limit(6)
        ->get();
    

        if ($siapa == 'me') {
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.laporan', [
                'pengaduan' => $pengaduan,
                'hitung' => $hitung,
                'siapa' => $siapa,
                'kategori' => $kategori,
                'selesai1' => $selesai1,
                'jumlah_pengaduan' => $jumlah_pengaduan
            ]);
        } else {
            $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.laporan', [
                'pengaduan' => $pengaduan,
                'hitung' => $hitung,
                'siapa' => $siapa,
                'kategori' => $kategori,
                'selesai1' => $selesai1,
                'jumlah_pengaduan' => $jumlah_pengaduan

            ]);
        }
    }

    public function show($id_pengaduan)
    {
        return view('User.pengaduan-detail', [
            'pengaduan' => Pengaduan::where('id_pengaduan', $id_pengaduan)->first()
        ]);
    }

    public function resetPassword()
    {
        return view('user.reset');
    }
    
    
}