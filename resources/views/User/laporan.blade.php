@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
<style>
    .zoomable-image {
        max-width: 100%;
        height: auto;
        cursor: zoom-in;
    }

    .zoomable-image.zoomed {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        z-index: 9999;
        cursor: zoom-out;
        background-color: rgba(0,0,0,0.8);
    }

    .bg-ungu{
        background-color: #6a70fc;
    }
</style>
@endsection

@section('title', 'Laporian - Pengaduan Masyarakat')

@section('content')
{{-- Section Card --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
                <div class="card mb-3">Tulis Laporan Disini</div>
                    <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="judul" placeholder="Masukan Judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                                rows="4">{{ old('isi_laporan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_kategori" aria-label="Default select example">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="lokasi" placeholder="Dimana lokasi kejadian" class="form-control"
                                rows="4">{{ old('lokasi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                    </form>
                </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a></h5>
                        <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pekat.laporan') }}">
                Semua
            </a>
            <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pekat.laporan', 'me') }}">
                Laporan Saya
            </a>
            <hr>
        </div>
        @foreach ($pengaduan as $k => $v)
        <div class="col-lg-8">
            <div class="laporan-top">
                <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
                <div class="d-flex justify-content-between">
                    <div>
                        <p>{{ $v->user->nama }}</p>
                        @if ($v->status == '0')
                        <p class="text-danger">Pending</p>
                        @elseif($v->status == 'proses')
                        <p class="text-warning">{{ ucwords($v->status) }}</p>
                        @else
                        <p class="text-success">{{ ucwords($v->status) }}</p>
                        @endif
                    </div>
                    <div>
                        <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="laporan-mid">
                <div class="judul-laporan mb-2">
                    {{ $v->judul }}
                </div>
                <p class="font-weight-bold"><i class="bi bi-geo-alt"></i> {{ $v->lokasi }}</p>
                <a href="" class="btn btn-primary btn-sm">
                    {{ $v->kategori->kategori }}
                </a>
                
                <p>{{ $v->isi_laporan }}</p>
            </div>
            <div class="laporan-bottom">
                @if ($v->foto != null)
                <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="w-100 h-100 zoomable-image">
                @endif
                @if ($v->tanggapan != null)
                    <div class="card shadow mt-3 bg-ungu text-white ">
                        <div class="card-body">
                            <p class="mt-3 mb-1">{{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
                            <p class="font-weight-light"><i class="bi bi-calendar"></i>  {{ $v->tanggapan->tgl_tanggapan->format('d M, h:i') }} </p>
                            <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                        </div>
                    </div>
                @endif
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2023 Adrian • All rights reserved</p>
    </div>
</div>
@endsection

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');
    
</script>
@endif
<script>
    const zoomableImages = document.querySelectorAll('.zoomable-image');

    zoomableImages.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('zoomed');
    });
    });
</script>
@endsection
