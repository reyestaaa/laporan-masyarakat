@extends('layouts.admin')

@section('title', 'TAMBAH DATA kategori')

@section('css')
    <style>
                .btn-ungu{
            background-color: #6a70fc;
            color: white;
        }
        .btn-ungu:hover{
            background-color: #9092ff;
            color: white;
        }
    </style>
@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <div class="card">
                <div class="card-header fs-3 fw-bold">
                    Tambah Berita
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="">{{ __('Judul') }}</label>
                            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>

                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="">{{ __('Kategori') }}</label>
                            <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}" {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>{{ $item->kategori }}</option>
                                @endforeach
                            </select>

                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi_berita" class="">{{ __('Isi Berita') }}</label>
                            {{-- <input type="hidden" value="{{ old('isi_laporan') }}" id="isi_laporan" name="isi_laporan" placeholder="Masukkan Isi Laporan">
                            <trix-editor placeholder="Masukan Laporan Anda" input="isi_laporan"></trix-editor> --}}

                            <input type="hidden" id="isi_berita" value="{{ old('isi_berita') }}" class="form-control @error('isi_berita') is-invalid @enderror" name="isi_berita" required>
                            <trix-editor input="isi_berita"></trix-editor>

                            @error('isi_berita')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="">{{ __('Gambar') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-ungu">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Berita') }}</div>

                    <div class="card-body"> --}}

@endsection

