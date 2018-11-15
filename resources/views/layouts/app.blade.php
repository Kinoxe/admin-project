<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS-->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles -->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div id="app">
        
        @include('shared.navbar')
        @guest
        @yield('content')
        @else
        <div class="content-wrapper">
            <div class="container-fluid ">
                @yield('content')
            </div>
            <footer class="sticky-footer">
                <div class="container">
                  <div class="text-center">
                    <small>Copyright © Your Website 2018</small>
                  </div>
                </div>
              </footer>
              <!-- Scroll to Top Button-->
              <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
              </a>
        </div>
        @endguest

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin.min.js') }}"></script>
        <!-- Custom scripts for this page-->
        <!-- Toggle between fixed and static navbar-->
        <script>
        $('#toggleNavPosition').click(function() {
          $('body').toggleClass('fixed-nav');
          $('nav').toggleClass('fixed-top static-top');
        });
            
    </div>
</body>
</html>
