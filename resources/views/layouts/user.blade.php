<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

    @yield('css')

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets-admin') }}/images/logo.png">


    <style>
        .underline:hover{
            text-decoration: underline;
            color: white
        }
    </style>
      <title>
        Laporian | @yield('title')
      </title> 

      <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
      
</head>

<body>

    {{-- Section Header --}}
    <section class="header">
        <nav class="navbar navbar-expand-lg bg-transparent">
            <div class="container">
                <a class="navbar-brand mt-2" href="{{ route('pekat.index') }}">
                    <h4 class="semi-bold mb-0 text-white">Laporian</h4>
                    <p class="italic mt-0 text-white">Pengaduan Masyarakat</p>
                </a> 
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                @if(Auth::guard('masyarakat')->check())
                <ul class="navbar-nav text-center ms-auto">
                    <li class="nav-item">
                        <a class="nav-link underline text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link underline text-white" href="{{ route('pekat.logout') }}" onclick="showLogoutAlert(event)"
                        style="text-decoration: underline">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn  btn-outline-light" href="{{ asset('user-manual-laporian.pdf') }}">Cara Penggunaan</a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav text-center ms-auto">
                   
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn underline text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Masuk
                        </button>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{ route('pekat.formRegister') }}" class="btn  btn-outline-light">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn  btn-outline-light" href="{{ asset('user-manual-laporian.pdf') }}">Cara Penggunaan</a>
                    </li>
                </ul>
                @endauth
              </div>
            </div>
        </nav>
        <div class="text-center aaa mt-5">
            <h2 class="fw-bold text-white mt-3">Layanan Pengaduan Masyarakat</h2>
            <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang petugas berwenang</p>
        </div>

        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </section>

    @yield('content')

    {{-- Footer --}}
    <div class="mt-5">
        <hr>
        <div class="text-center">
            <p class="italic text-secondary">© 2023 Adrian Reyesta • All rights reserved</p>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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
