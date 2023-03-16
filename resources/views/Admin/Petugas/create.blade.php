@extends('layouts.admin')

@section('title', 'TAMBAH DATA PETUGAS')

@section('content')

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-12">
            <div class="card shadow">
                <div class="card-header fs-4 fw-semibold">
                    Form Tambah Petugas/Admin
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama_petugas">Nama Petugas / Admin</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control @error('nama_petugas') is-invalid @enderror" value="{{ old('nama_petugas') }}">
                            @error('nama_petugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="telp">No.telepon</label>
                            <input type="number" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}">
                            @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="level">Level</label>
                            <select class="form-select @error('level') is-invalid @enderror" name="level" id="level" aria-label="Default select example">
                                <option selected>Pilih level</option>
                                <option value="petugas" @if(old('level') == 'petugas') selected @endif>Petugas</option>
                                <option value="admin" @if(old('level') == 'admin') selected @endif>Admin</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        @if (Session::has('username'))
        <div class="alert bg-danger">
            {{ Session::get('username') }}
        </div>
        @endif

        
        {{-- @if ($errors->any())
            @foreach ($errors->any() as $error)
            <div class="alert bg-danger">
                {{ $error }}
            </div>
            @endforeach
        @endif --}}

    </div>

@endsection

