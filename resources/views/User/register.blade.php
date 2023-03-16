@extends('layouts.auth')

@section('css')
<style>
    body {
        background: #6a70fc;
    }

    .btn-purple {
        background: #6a70fc;
        width: 100%;
        color: #fff;
    }

</style>
@endsection

@section('header', 'Halaman Daftar')

@section('content')
<main class=""  style="background: linear-gradient(rgba(106, 112, 252, 0.8), rgba(106, 112, 252, 0.8)), url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); ">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-6 p-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="mb-2 mt-2">Selamat Datang!</h1>
                        <p class="text-lead ">Masukan data dengan benar dan sesuai</p>
                    </div>
                    <div class="container">
                        @if (Session::has('pesan'))
                        <div class="alert bg-danger text-white mt-2">
                            {{ Session::get('pesan') }}
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekat.register') }}" method="POST" role="form" >
                            @csrf
                            <div class="mb-3">
                                <input type="number" name="nik" placeholder="NIK" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="alamat" placeholder="Alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="telp" placeholder="No. Telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" required>
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check form-check-info text-start">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-purple mt-3 mb-4">Sign up</button>
                            </div>
                        </form>
                        
                        
                         <a href="/" class="mt-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
