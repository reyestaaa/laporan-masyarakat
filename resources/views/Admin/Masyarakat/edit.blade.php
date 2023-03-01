@extends('layouts.admin')

@section('header', 'Data Masyarakat')

@section('content')

     <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-3 fw-bold">
                    Form Tambah Kategori
                </div>
                <div class="card-body">
                    <form action="{{ route('masyarakat.update', $masyarakat->nik ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" value="{{ $masyarakat->nik }}" name="nik" id="nik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" value="{{ $masyarakat->nama }}" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username"> Username</label>
                            <input type="text" value="{{ $masyarakat->username }}" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" value="{{ $masyarakat->password }}" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input type="text" value="{{ $masyarakat->telp }}" name="telp" id="telp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                        <a class="btn btn-danger mt-2" href="{{ route('masyarakat.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

