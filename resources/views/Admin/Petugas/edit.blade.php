@extends('layouts.admin')

@section('title', 'EDIT DATA PETUGAS')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-4 fw-semibold">
                    Form Edit Petugas
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id_petugas ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="{{ $petugas->username }}" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password', $petugas->password) }}">

                        </div>
                        <div class="form-group">
                            <label for="telp">No.telepon</label>
                            <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-select" name="level" id="level" aria-label="Default select example">
                                @if ($petugas->level == 'admin')
                                 <option selected value="admin">Admin</option>
                                 <option value="petugas">Petugas</option>
                                @else
                                 <option value="admin">Admin</option>
                                 <option selected value="petugas">Petugas</option>
                                @endif
                              
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

