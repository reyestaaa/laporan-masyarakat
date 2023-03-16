@extends('layouts.admin')

@section('title', 'TAMBAH DATA kategori')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header fs-3 fw-bold">
                    Edit Berita
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input  type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $berita->judul }}">
                            @error('judul')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_kategori">Kategori</label>
                            <select  name="id_kategori" id="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                                @foreach ($kategori as $k)
                                <option value="{{ $k->id_kategori }}" {{ $berita->id_kategori == $k->id_kategori ? 'selected' : '' }}>{{ $k->kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="isi_berita">Isi Berita</label>
                            <input type="hidden" value="{{ $berita->isi_berita }}" name="isi_berita" id="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror">
                            <trix-editor input="isi_berita"></trix-editor>
                            @error('isi_berita')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            <input  type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <img src="{{ asset('storage/'.$berita->image) }}" alt="{{ $berita->judul }}" class="w-50">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

