<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
        <div class="navigation-trigger__inner">
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
        </div>
    </div>

    <div class="header__logo hidden-sm-down">
        <h1><a href="/admin" class="no-underline"><img src="{{cloud('app/brand/logo.svg')}}" class="mr-2" style="width: 3.2em"></a></h1>
    </div>

    <ul class="top-nav d-flex">

        <li class="top-nav__notifications"><a href="{{route('admin.email.create')}}" class="nav-link"><h5 class="m-0"><i class="fas fa-envelope-open"></i></h5></a></li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h5 class="m-0 position-relative notifications-badge">
                    @if(count($notifications) > 0)
                    <small><span class="badge badge-danger">{{limit(count($notifications))}}</span></small>
                    @endif
                    <i class="fas fa-bell"></i>
                </h5>
            </a>

            @include('components/notifications/layout', ['guard' => '/admin'])

        </li>

    @include('/admin/components/apps')

    <li class="top-nav__notifications">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-lg mt-1"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form> 
        </a>
    </li>
</ul>
</header>