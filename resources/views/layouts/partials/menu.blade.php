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
          <a class="dropdown-item" href="{{route('discover.browse')}}">@lang('Our catalogue')</a>
          <a class="dropdown-item" href="{{route('courses.index')}}">@lang('Courses')</a>
          <a class="dropdown-item" href="{{route('discover.asanas.index')}}">@lang('Glossary of Asanas')</a>
          <a class="dropdown-item" href="{{route('discover.wallpapers')}}">@lang('Yoga wallpapers')</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('Reads')
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('reads.articles.index', 'asana')}}">@lang('Articles')</a>
          <a class="dropdown-item" href="{{route('reads.books')}}">@lang('Books')</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('About us')
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('about.our-platform')}}">Anandamayi Yoga</a>
          <a class="dropdown-item" href="{{route('about.anandamayi')}}">Anandamayi</a>
          <a class="dropdown-item" href="{{route('about.eranthus-books')}}">@lang('Eranthus books')</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('support.index')}}">@lang('Help')</a>
      </li>
   
      <li class="nav-item">
        <a class="nav-link" href="{{route('support.contact.show')}}">@lang('Contact us')</a>
      </li>

      @auth
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <h5 class="m-0 position-relative notifications-badge">

            @if(count($notifications) > 0)
            <small><span class="badge badge-danger">{{count($notifications)}}</span></small>
            @endif
            
            <i class="fas fa-fw fa-bell"></i>
          </h5>
        </a>

        @include('components/notifications/layout')

      </li>
      <li class="nav-item dropdown">
        <a class="nav-link pt-0 pb-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar rounded-circle bg-full d-none d-lg-block" title="{{auth()->user()->fullName}}" style="background-image: url({{auth()->user()->avatar()}})"></div>
          <span class="d-block d-lg-none">My Profile</span>
        </a>
        <div class="shadow dropdown-menu  animated-fast fadeInUp dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/me"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-home"></i></small>Dashboard</a>
          <a class="dropdown-item" href="{{route('user.recommended')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-gift"></i></small>Recommended</a>
          <a class="dropdown-item" href="{{route('user.favorites')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-heart"></i></small>Favorites</a>
          <a class="dropdown-item" href="{{route('user.courses')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-book"></i></small>My courses</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('user.settings.profile')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-cog"></i></small>Settings</a>
          <a class="dropdown-item" href="{{route('user.settings.preferences')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-tags"></i></small>Preferences 

            @include('components/snippets/yellow-dot', ['condition' => !auth()->user()->hasPreferencesSelected()])

          </a>
          <a class="dropdown-item" href="{{route('user.settings.membership')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-th-list"></i></small>Membership 

            @include('components/snippets/yellow-dot', ['condition' => ! auth()->user()->membership && auth()->user()->isOnTrial()])

          </a>
          <a class="dropdown-item" href="{{route('user.settings.invoices')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-file-alt"></i></small>Invoices</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" 
            href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <small><i class="d-none d-lg-inline fas mr-3 text-muted fa-sign-out-alt"></i></small>Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form> 
          </a>
        </div>
      </li>   
      @else
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#login" href="">Login</a>
      </li>
      <li class="nav-item nav-item-signup">
        <a class="nav-link signup" href="{{route('register')}}"><strong>@lang('Sign up')</strong></a>
      </li>
      @endauth

    </ul>
  </div>
</nav>