<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bs4/css/bootstrap.min.css') }}">
    @stack('styles')
</head>
<body>
    <x-Navbar></x-Navbar>

    <div style="min-height: 700px">
      @yield('content')
    </div>


  <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="https://mdbootstrap.com/"> HereForYou.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <script src="{{ asset('assets/bs4/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bs4/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
