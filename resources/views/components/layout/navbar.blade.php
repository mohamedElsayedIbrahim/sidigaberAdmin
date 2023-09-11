<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('login') }}">Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @guest
              
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">@lang('site.login')</a>
          </li>

          @endguest

          @auth

          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="#">@lang('site.welcomeUser'), {{Auth::user()->name}}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">@lang('site.logout')</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="modal" href="#staticBackdrop">@lang('site.change.pass')</a>
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