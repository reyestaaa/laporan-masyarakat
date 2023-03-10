@extends('layouts.admin')

@section('title', 'Data Masyarakat')

@section('content')

     <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-3 fw-bold">
                    Form Edit Masyarakat
                </div>
                <div class="card-body">
                    <form action="{{ route('masyarakat.update', $masyarakat->nik ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" value="{{ $masyarakat->alamat }}" name="alamat" id="alamat" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telp">Telp</label>
                            <input type="text" value="{{ $masyarakat->telp }}" name="telp" id="telp" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success mt-2 fw-semibold">Kirim</button>
                        <a class="btn btn-danger mt-2 fw-semibold" href="{{ route('masyarakat.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

