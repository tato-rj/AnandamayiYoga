<nav class="navbar fixed-top t-2 navbar-expand-lg p-4">
  <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
    <div>
      <img src="{{cloud('app/brand/logo.svg')}}">
      <img src="{{cloud('app/brand/logo-pink.svg')}}" style="display:none; opacity:0.8">
    </div>
    <div class="d-none d-sm-block">
      <h2 id="brand-name" class="mb-0 ml-2 text-white" style="font-size: 1.2em"><strong>Anandamayi<span style="color:#d3eaff">Yoga</span></strong></h2>
    </div>
  </a>
  <div class="d-flex align-items-center">
    @auth
        <div class="mt-1 d-block d-lg-none">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h5 class="m-0 position-relative notifications-badge">

              @if(count($notifications) > 0)
              <small><span class="badge badge-danger">{{count($notifications)}}</span></small>
              @endif
              
              <i class="fas fa-fw fa-bell"></i>
            </h5>
          </a>

          @include('components/notifications/layout')
      
        </div>
      @endauth
<button class="hamburger hamburger--elastic navbar-toggler border-0" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>
</div>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('Discover')
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('discover.browse')}}">@lang('Classes & Programs')</a>
          @auth
            <a class="dropdown-item" href="{{route('user.routine.instructions')}}">@lang('4-week Yoga Routine')</a>
          @endauth
          {{-- <a class="dropdown-item" href="{{route('courses.index')}}">@lang('Courses')</a> --}}
          <a class="dropdown-item" href="{{route('discover.asanas.index')}}">@lang('Glossary of Asanas')</a>
          <a class="dropdown-item" href="{{route('discover.wallpapers')}}">@lang('Yoga wallpapers')</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('About yoga')
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          {{-- <a class="dropdown-item" href="{{route('reads.articles.index', 'asana')}}">@lang('What is yoga?')</a> --}}
          <a class="dropdown-item" href="{{route('reads.articles.index', 'asana')}}">@lang('Articles archive')</a>
          <a class="dropdown-item" href="{{route('reads.books')}}">@lang('Books')</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('About us')
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('about.our-platform')}}">Anandamayi Yoga</a>
          <a class="dropdown-item" href="{{route('about.anandamayi')}}">Yogini Anandamayi</a>
          {{-- <a class="dropdown-item" href="{{route('teachers.index')}}">@lang('Our teachers')</a> --}}
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('support.contact.show')}}">@lang('Contact')</a>
      </li>

      @include('layouts.menu.auth')

    </ul>
  </div>
</nav>