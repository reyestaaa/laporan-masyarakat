@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    body{
        overflow-x: hidden;
    }
    i.bi{
        font-size: 3em;
        color: white;
    }

    .bg-icon{
        background-color: #6a70fc;
        padding: 20px;
        border-radius: 1%;
        margin-bottom: 20px;
    }
    .text-ungu{
        color: #6a70fc;
    }

    input::placeholder {
        color: #777;
    }

    .form-control, .form-select{
        border-color: rgb(142, 142, 142);
    }



</style>
@endsection

@section('title', 'Pengaduan Masyarakat')

@section('content')

{{-- Section Card Pengaduan --}}
<div class="row justify-content-center">
    <div class="col-lg-7 col-10 col">
        <div class="content shadow rounded">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            @if (Session::has('loginb'))
            <div class="alert alert-success mt-2">
                {{ Session::get('loginb') }}
            </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form id="form-pengaduan" action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" name="judul" placeholder="Masukan Judul" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="id_kategori" aria-label="Default select example">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <textarea name="lokasi" placeholder="Dimana lokasi kejadian" class="form-control"
                        rows="4">{{ old('lokasi') }}</textarea>
                </div>
                <div class="mb-3">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>

<section id="apk" style="border-bottom:0; margin-top:100px; margin-bottom:150px;">
    <div class="container">
        <div class="p-5">
            <div class="row bs-wizard" style="border-bottom:0; margin-bottom:70px;">
                <div class="col-md-3  mb-3col-xs-offset-1 bs-wizard-step active">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Tulis Laporan</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-reply-fill"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Proses Verifikasi</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada petugas berwenang
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-chat-fill"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Proses Tindak Lanjut</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Dalam 5 hari, petugas akan menindaklanjuti dan membalas laporan Anda
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-check"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Selesai</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                    </div>
                </div>
            
            </div>

            <hr>

            <div class="row mt-5">
                <h4 class="mt-2 text-center fw-bold">Laporan <span class="text-success"> Selesai</span></h4>
                @foreach ($selesai as $item)
                <div class="col-lg-4 col-md-4">
                    <div class="card mt-3 shadow" style="background: url({{ asset('/images') }}/done.png)  no-repeat bottom right;">
                        <div class="card-body">
                            <div class="fw-semibold mb-3 fs-5 text-ungu">{{ $item->judul }}</div>
                            <img src="" alt="">
                            <p class="fw-light">{{ substr($item->isi_laporan, 0, 70) }}...</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
</section>

{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">{{ $pengaduan }}</h2>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">
            <h3 class="mt-1">Masuk terlebih dahulu</h3>
            <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
            <form action="{{ route('pekat.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="mb-2" for="username">Username</label>
                    <input type="text" name="username" placeholder="Masukan Username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="password">Password</label>
                    <input type="password" name="password" placeholder="Masukan Password" id="password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                <div class="mb-3 mt-3">
                     <p>Apakah kamu seorang <a href="/admin">admin?</a></p>
                </div>
                <div class="mb-3 mt-3">
                    <p> 
                       <a href="/reset-password" target="_blank">Lupa sandi?</a>
                       Hubungi admin kami untuk mendapatkan bantuan
                   </p>
               </div>
            </form>

            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
        

            @if (Session::has('berhasil'))
                <div class="alert alert-success mt-2">
                    {{ Session::get('berhasil') }}
                </div>
            @endif
        </div>
      </div>
    </div>
</div>
  

@endsection

@section('js')
    @if (Session::has('pesan') || Session::has('berhasil'))
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
        });
    </script>
    @endif

    <script>
        // Dapatkan elemen form dan tombol kirim
        const formPengaduan = document.getElementById('form-pengaduan');
        const btnKirim = formPengaduan.querySelector('button[type="submit"]');
    
        // Tambahkan event listener pada tombol kirim
        btnKirim.addEventListener('click', function(event) {
            // Cek apakah pengguna sudah login atau belum
            if (!{{ Auth::guard('masyarakat')->user() ? 'true' : 'false' }}) {
                // Tampilkan modal login jika belum login
                event.preventDefault(); // Mencegah form dikirim
                $('#exampleModal').modal('show'); // Menampilkan modal login
            }
        });
    </script>
    
@endsection