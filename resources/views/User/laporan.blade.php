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
        
        .text-ungu{
            color: #6a70fc;
        }

        .btn-ungu{
            background-color: #6a70fc;
            color: white;
        }
        .btn-ungu:hover{
            background-color: #9092ff;
            color: white;
        }

        .form-control, .form-select{
            border-color: #8e8e8e;
        }
        .header{
  height: 330px;
}

/* Media query untuk layar berukuran kecil */
@media screen and (max-width: 767px) {
  .header{
    height: 350px;
  }
}

/* Media query untuk layar berukuran sedang */
@media screen and (min-width: 768px) and (max-width: 991px) {
  .header{
    height: 370px;
  }
}

/* Media query untuk layar berukuran besar */
@media screen and (min-width: 992px) {
  .header{
    height: 330px;
  }
}



    </style>
@endsection

@section('title', 'Pengaduan Masyarakat')

@section('content')
{{-- Section Card --}}
<div class="container">
    <div class="wrap">
        <div class="row">

            <div class="col-md-8 p-4">
                <div class="card shadow p-3">
                    <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if (Session::has('pengaduan'))
                                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                      <h5 class="card-title bg-ungu text-white fw-semibold p-3 mb-3">Tulis Laporan Disini</h5>
                      <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="judul" placeholder="Masukan Judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                                rows="4">{{ old('isi_laporan') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="id_kategori" aria-label="Default select example">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="lokasi" placeholder="Dimana lokasi kejadian" class="form-control"
                                rows="4">{{ old('lokasi') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-ungu text-white w-50 mt-2 fw-semibold">Kirim</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <a class="nav-link d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pekat.laporan') }}">
                            Semua
                        </a>
                        <a class="nav-link d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pekat.laporan', 'me') }}">
                            Laporan Saya
                        </a>
                        <hr>
                    </div>
                    @foreach ($pengaduan as $k => $v)
                    <div class="col-lg-12">
                        <div class="laporan-top">
                            <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-semibold">{{ $v->user->nama }}</p>
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
                            <a href="{{ route('pekat.show', $v->id_pengaduan) }}" class="nav-link judul-laporan mb-2">
                                {{ $v->judul }}
                            </a>
                            <p class="fw-bold"><i class="bi bi-geo-alt"></i> {{ $v->lokasi }}</p>

                            <p class="fw-bold mb-4">
                                <i class="bi bi-bookmark-fill text-primary"></i>
                                <a href="" class="btn btn-primary btn-sm">
                                    {{ $v->kategori->kategori }}
                                </a>
                            </p>
                           
                            <p class="fw-semibold"> {{ substr($v->isi_laporan, 0, 300) }}...</p>
                        </div>
                        <div class="laporan-bottom">
                            @if ($v->foto != null)
                            <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="zoomable-image">
                            @endif
                        </div>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <div class="card p-4 shadow">
                    <div class="d-flex ">
                        <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                        <div>
                            <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a></h5>
                            <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
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

                {{-- LAPORAN SELESAI --}}
                <div class="card mt-3 p-3 shadow">
                    <h4 class="mt-2 text-center fw-bold">Laporan <span class="text-success"> Selesai</span></h4>
                    @foreach ($selesai1 as $item)
                    <div class="card mt-3" style="background: url({{ asset('/images') }}/done.png)  no-repeat bottom right;">
                            <div class="card-body">
                                <a href="{{ route('pekat.show', $v->id_pengaduan) }}" class="fw-bold fs-5 mb-3 nav-link text-ungu">{{ $item->judul }}</a>
                                <p class="">{{ substr($item->isi_laporan, 0, 120) }}</p>
                                <p>
                                    <i class="bi bi-person-circle"></i>
                                    {{ $item->user->nama }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card shadow mt-4 p-3">
                    <h5 class="mt-2 text-center fw-semibold">Kategori Paling Populer</h5>
                    <hr>
                    <div class="card-body">
                       
                            <table class="table table-bordered border-secondary text-center">
                                <thead class="bg-ungu text-white">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jumlah_pengaduan as $jumlah)
                                    <tr>
                                        <td class="text-start">{{ $jumlah->kategori }}</td>
                                        <td>{{ $jumlah->jumlah_pengaduan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('js')
    @if (Session::has('pesan'))
    <script>
        $('#exampleModal').modal('show');
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
