@extends('layouts.admin')

@section('header', 'TAMBAH DATA PETUGAS')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Petugas
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telp">No.telepon</label>
                            <input type="text" name="telp" id="telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-select" name="level" id="level" aria-label="Default select example">
                                <option selected>Pilih level</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('username'))
                <div class="alert alert-danger">
                    {{ Session::get('username') }}
                </div>
            @endif

            
            @if ($errors->any())
                @foreach ($errors->any() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
            @endif
            
        </div>
    </div>

@endsection

