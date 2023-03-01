@extends('layouts.admin')

@section('header', 'TAMBAH DATA kategori')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-3 fw-bold">
                    Form Tambah Kategori
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

