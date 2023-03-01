<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

    @yield('css')

    <title>@yield('title')</title>
</head>

<body>

    {{-- Section Header --}}
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('pekat.index') }}">
                        <h4 class="semi-bold mb-0 text-white">Laporian</h4>
                        <p class="italic mt-0 text-white">Pengaduan Masyarakat</p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        @if(Auth::guard('masyarakat')->check())
                        <ul class="navbar-nav text-center ml-auto">
                            <li class="nav-item">
                                <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}" onclick="showLogoutAlert(event)"
                                style="text-decoration: underline">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                            </li>
                        </ul>
                        @else
                        <ul class="navbar-nav text-center ml-auto">
                            <li class="nav-item">
                                <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#loginModal">Masuk</button>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        <div class="text-center">
            <h2 class="medium text-white mt-3">Layanan Pengaduan Masyarakat</h2>
            <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang petugas berwenang</p>
        </div>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </section>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script>
        function showLogoutAlert(event) {
        event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = event.target.href;
                }
            });
        }

    </script>

    @yield('js')
    
</body>

</html>