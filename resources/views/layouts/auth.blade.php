<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <title>
    Laporian | @yield('header')
  </title> 
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body>

    @yield('content')

  <!--   Core JS Files   -->
  <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    @yield('js')
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>