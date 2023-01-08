<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rental Lapangan</title>
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/sign-in.css') }}" />
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">RenField</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ url('/about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ url('/orders') }}">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ url('/contact') }}">Contact</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  @if (auth()->user()->isAdmin())
                    <li class="dropdown-item">
                      <a href="/admin/field" class="text-decoration-none text-dark">My Dashboard</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                  @endif
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ url('/login') }}">Login</a>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>
    <!-- Header-->
    <div class="min-vh-100">

        @yield('content')
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; RenField 2023
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
  </body>
</html>
