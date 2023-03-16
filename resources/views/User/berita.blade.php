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
            @foreach ($berita as $item)
                <div class="col-sm-6 mb-5 mt-5 mb-sm-0">
                    <div class="card shadow border-0">
                    <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body border-top border-2 border-dark px-4 py-4">
                        <div class=" d-flex align-items-center  justify-content-between align-items-center mb-4">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <a href="" class="btn btn-primary btn-sm">{{ $item->kategori->kategori }}</a>
                        </div>
                        <p class="card-text">{{ substr(strip_tags($item->isi_berita), 0, 100) }}
                        </p>
                        <a href="{{ route('show.berita', $item->id) }}" class="btn btn-ungu">Lihat Selanjutnya</a>
                        </div>
                        <div class="card-footer">
                            <p>
                            <i class="bi bi-clock fs-6 text-dark"></i>
                            {{ $item->created_at->format('d M, h:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $berita->links() }}
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