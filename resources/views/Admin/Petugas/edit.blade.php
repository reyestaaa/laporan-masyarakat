@extends('layouts.admin')

@section('title', 'EDIT DATA PETUGAS / Admin')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-4 fw-semibold">
                    Form Edit Petugas / Admin
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id_petugas ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas / Admin</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" value="{{ $petugas->nama_petugas }}">
                        @error('nama_petugas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ $petugas->username }}">
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="{{ $petugas->password }}" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">No.telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="{{ $petugas->telp }}">
                        @error('telp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-select" name="level" id="level" aria-label="Default select example">
                            <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('level')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

