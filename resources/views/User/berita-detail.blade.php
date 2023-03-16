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

        .my-editor {
            width: 100%; /* menentukan lebar editor */
            min-height: 300px; /* menentukan tinggi editor */
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
                        <img src="{{ Storage::url($berita->image) }}" alt="{{ 'Gambar '.$berita->judul_laporan }}" class="img-fluid">
                        <h3 class="text-ungu mt-3">{{ $berita->judul }}</h3>
                        <article>
                            {!! $berita->isi_berita !!}
                        </article>
                        <a href="/" class="mt-4">Kembali</a>
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