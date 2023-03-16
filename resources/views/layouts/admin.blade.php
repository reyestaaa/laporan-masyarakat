<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title') &dash; {{ config('app.name') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets-admin') }}/images/logo.png">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/assets-admin') }}/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets-admin') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Choices.js -->
    <link href="{{ asset('/assets-admin') }}/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet"
        type="text/css" />
        
    <!-- Icons Css -->
    <link href="{{ asset('/assets-admin') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    @yield('css')

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- App Css-->
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link href="{{ asset('/assets-admin') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets-admin') }}/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- <body data-layout="horizontal"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header border-bottom border-3 border-primary">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('/assets-admin') }}/images/logo.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('/assets-admin') }}/images/logo.png" alt="" height="24"> <span
                                    class="logo-txt">Laporian</span>
                            </span>
                        </a>
                        <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('/assets-admin') }}/images/logo.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('/assets-admin') }}/images/logo.png" alt="" height="24"> <span
                                    class="logo-txt">Laporian</span>
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('/assets-admin') }}/images/users/avatar-10.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">
                              {{ Auth::guard('admin')->user()->nama_petugas }}
                            </span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i></i>
                                <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
              @include('layouts.sidebar')
                {{-- @include('admin::partials.sidebar') --}}
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © LAPORIAN APLIKASI LAPORAN MASYARAKAT.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="#!" class="text-decoration-underline">MUHAMMAD ADRIAN REYESTA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->

    <script src="{{ asset('/assets-admin') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/assets-admin') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets-admin') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/assets-admin') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/assets-admin') }}/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('/assets-admin') }}/libs/node-waves/waves.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- apexcharts js -->
    <script src="{{ asset('/assets-admin') }}/libs/apexcharts/apexcharts.min.js"></script>
    <!-- pace js -->
    <script src="{{ asset('/assets-admin') }}/libs/pace-js/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/assets-admin') }}/js/app.js"></script>
    <script src="{{ asset('/assets-admin') }}/js/custom.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    @yield('js')
</body>
</html>


