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
    <a class="dropdown-item" href="/me"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-home"></i></small>@lang('Dashboard')</a>
    <a class="dropdown-item" href="{{route('user.recommended')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-gift"></i></small>@lang('Recommended')</a>
    <a class="dropdown-item" href="{{route('user.favorites')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-heart"></i></small>@lang('Favorites')</a>
    <a class="dropdown-item" href="{{route('user.courses')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-book"></i></small>@lang('My courses')</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route('user.settings.profile')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-cog"></i></small>@lang('Settings')</a>
    <a class="dropdown-item" href="{{route('user.settings.preferences')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-tags"></i></small>@lang('Preferences') 

      @include('components/snippets/yellow-dot', ['condition' => !auth()->user()->hasPreferencesSelected()])

    </a>
    <a class="dropdown-item" href="{{route('user.settings.membership')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-th-list"></i></small>@lang('Membership') 

      @include('components/snippets/yellow-dot', ['condition' => ! auth()->user()->membership && auth()->user()->isOnTrial()])

    </a>
    <a class="dropdown-item" href="{{route('user.settings.invoices')}}"><small><i class="d-none d-lg-inline fas mr-3 text-muted fa-file-alt"></i></small>@lang('Invoices')</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" 
    href="{{ route('logout') }}" 
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <small><i class="d-none d-lg-inline fas mr-3 text-muted fa-sign-out-alt"></i></small>@lang('Logout')
    <form id="logout-form" action="{{ route('logout', ['guard' => 'open']) }}" method="POST" style="display: none;">
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