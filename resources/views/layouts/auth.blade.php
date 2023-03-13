<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>
    Laporian | @yield('header')
  </title> 

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets-admin') }}/images/logo.png">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/assets-admin') }}/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets-admin') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/assets-admin') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    @stack('stylesheets')
    @yield('css')

        <!-- Choices.js -->
        <link href="{{ asset('/assets-admin') }}/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet"
        type="text/css" />

    <!-- App Css-->
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link href="{{ asset('/assets-admin') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets-admin') }}/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

  @yield('css')
</head>

<body>

    @yield('content')

     <!-- JAVASCRIPT -->
     <script src="{{ asset('/assets-admin') }}libs/jquery/jquery.min.js"></script>
     <script src="{{ asset('/assets-admin') }}libs/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="{{ asset('/assets-admin') }}libs/metismenu/metisMenu.min.js"></script>
     <script src="{{ asset('/assets-admin') }}libs/simplebar/simplebar.min.js"></script>
     <script src="{{ asset('/assets-admin') }}libs/node-waves/waves.min.js"></script>
     <script src="{{ asset('/assets-admin') }}libs/feather-icons/feather.min.js"></script>
     <!-- pace js -->
     <script src="{{ asset('/assets-admin') }}libs/pace-js/pace.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @stack('scripts')
    @yield('js')
</body>

</html>