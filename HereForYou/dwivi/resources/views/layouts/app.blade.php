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
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultations.index') }}">Consultation</a>
                    </li>
                    
                    @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @else 
                    @if (auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @else 
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('history.index') }}">Histori</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit()">Logout</a>
                          <form action="{{ route('logout') }}" method="post" id="formLogout">
                            @csrf
                          </form>
                        </div>
                    </li>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
      </nav>

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
