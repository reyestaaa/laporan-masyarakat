@extends('layouts.user')

@section('title', 'Pengaduan Masyarakat')

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

        img{
            width: clamp(200px, 50%, 300px);
    height: clamp(200px, 50%, 300px);
    cursor: pointer;
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
        /* .wrap {
            margin-top: -7.5rem;
        } */


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
@section('content')

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="laporan-top">
                            <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-bold"> {{ $pengaduan->user->nama }}</p>
                                    @if ($pengaduan->status == '0')
                                    <p class="text-danger">Pending</p>
                                    @elseif($pengaduan->status == 'proses')
                                    <p class="text-warning">{{ ucwords($pengaduan->status) }}</p>
                                    @else
                                    <p class="text-success">{{ ucwords($pengaduan->status) }}</p>
                                    @endif
                                </div>
                                <div>
                                    <p>{{ $pengaduan->tgl_pengaduan->format('d M, h:i') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="laporan-mid">
                            <a href="{{ route('pekat.show', $pengaduan->id_pengaduan) }}"class="judul-laporan nav-link mb-2">
                                {{ $pengaduan->judul }}
                            </a>
                            <p class="font-weight-bold"><i class="bi bi-geo-alt"></i> {{ $pengaduan->lokasi }}</p>
                            <a href="" class="btn btn-primary btn-sm">
                                {{ $pengaduan->kategori->kategori }}
                            </a>
                            
                            <p>{{ $pengaduan->isi_laporan }}</p>
                        </div>
                        <div class="laporan-bottom">
                            
                            @if ($pengaduan->foto != null)
                                <img src="{{ Storage::url($pengaduan->foto) }}" alt="{{ 'Gambar '.$pengaduan->judul_laporan }}" class="zoomable-image">
                            @endif
                            {{-- Pengaduan Tanggapan --}}
                            @if ($pengaduan->tanggapan != null)
                                <hr>    
                                <h4 class="mt-5 fw-bold">Tanggapan Petugas :</h4>
                                @foreach ($pengaduan->tanggapan()->get() as $tanggapan)
                                    <div class="card shadow mt-3  ">
                                        <div class="card-body bg-ungu text-white">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <i class="bi bi-person-circle fs-3"></i>
                                                    <p class="mt-1 fs-4 ms-2 mb-1">{{  $tanggapan->petugas->nama_petugas }}</p>
                                                </div>
                                                <p class="font-weight-light mt-2"><i class="bi bi-calendar"></i>  {{ $tanggapan->tgl_tanggapan }} </p>
                                            </div>
                                            <a href="">{{ $tanggapan->status }}</a>
                                            <hr>
                                            <div class="p-2">
                                                <p class="light">{{ $tanggapan->tanggapan }}</p>
                                            </div>
                                            @if ($tanggapan->foto != null)
                                            <img src="{{ Storage::url($tanggapan->foto) }}" alt="{{ 'Gambar '.$tanggapan->judul_laporan }}" class="zoomable-image">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{--End Pengaduan Tanggapan --}}

                                
                        </div>
                        <a href="/laporan" class="mt-4">Kembali</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    const zoomableImages = document.querySelectorAll('.zoomable-image');

    zoomableImages.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('zoomed');
    });
    });
</script>
@endsection