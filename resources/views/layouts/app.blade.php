<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @yield('css')  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
</head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">Panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              @guest
                  
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">@lang('site.login')</a>
              </li>

              @endguest

              @auth

              <li class="nav-item">
                <a class="nav-link disabled" aria-current="page" href="#">@lang('site.welcomeUser'), {{Auth::user()->name}}</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">@lang('site.logout')</a>
              </li>

              @endauth

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-language fx-2x"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('lang.en') }}">@lang('site.en') </a></li>
                  <li><a class="dropdown-item" href="{{ route('lang.ar') }}">@lang('site.ar')</a></li>
                </ul>
              </li>
              
            </ul>
           
        </div>
      </nav>
    @yield('header')
    <section class="content py-5">

        <div class="container">
            @yield('content')
        </div>

    </section>

    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <p>@lang('site.copyright') <a href="https://sidigaber.org" class="link" target="_balnk">@lang('site.company')</a> &copy; 2022</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')

  </body>
</html>