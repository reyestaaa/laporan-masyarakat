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


</style>
@endsection

@section('title', 'Laporian - Pengaduan Masyarakat')

@section('content')

{{-- Section Card Pengaduan --}}
<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

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

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="judul" placeholder="Masukan Judul" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="id_kategori" aria-label="Default select example">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="lokasi" placeholder="Dimana lokasi kejadian" class="form-control"
                        rows="4">{{ old('lokasi') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>

<section id="apk" style="border-bottom:0; margin-top:150px; margin-bottom:150px;">
    <div class="container">
        <div class="row bs-wizard" style="border-bottom:0;">
            <div class="col-md-3 col-xs-offset-1 bs-wizard-step active">
                <div class="text-center bg-icon ">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h4 class="text-center font-weight-bold">Tulis Laporan</h4>
                <div class="bs-wizard-info text-center">
                    Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                </div>
            </div>
        
            <div class="col-md-3 bs-wizard-step">
                <div class="text-center bg-icon ">
                    <i class="bi bi-reply-fill"></i>
                </div>
                <h4 class="text-center font-weight-bold">Proses Verifikasi</h4>
                <div class="bs-wizard-info text-center">
                    Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada petugas berwenang
                </div>
            </div>
        
            <div class="col-md-3 bs-wizard-step">
                <div class="text-center bg-icon ">
                    <i class="bi bi-chat-fill"></i>
                </div>
                <h4 class="text-center font-weight-bold">Proses Tindak Lanjut</h4>
                <div class="bs-wizard-info text-center">
                    Dalam 5 hari, petugas akan menindaklanjuti dan membalas laporan Anda
                </div>
            </div>
        
            <div class="col-md-3 bs-wizard-step">
                <div class="text-center bg-icon ">
                    <i class="bi bi-check"></i>
                </div>
                <h4 class="text-center font-weight-bold">Selesai</h4>
                <div class="bs-wizard-info text-center">
                    Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                </div>
            </div>
        
        </div>
    </div>
</section>

{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">10</h2>
        </div>
    </div>
</div>

{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2023 Adrian • All rights reserved</p>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <p>Apakah kamu seorang <a href="/admin">admin?</a></p>
                    <p>Jika anda lupa password/userame segera hubungi admin</p>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
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
    @if (Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');
    </script>
    @endif
    @if (Session::has('berhasil'))
    <script>
        $('#loginModal').modal('show');
    </script>
    @endif
@endsection