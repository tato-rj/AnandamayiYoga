<nav class="sidebar">
    <div class="scrollbar-inner">

        <ul class="navigation">

            @include('admin.layouts.menu.link', ['url' => 'admin', 'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'])

            @manager
            @include('admin.layouts.menu.group', [
                'icon' => 'fas fa-chart-line', 'label' => 'Reports',
                'urls' => [
                    'admin/statistics' => 'Statistics',
                    'admin/subscriptions' => 'Subscriptions',
                    'admin/feedbacks' => 'Feedbacks']])

            @include('admin.layouts.menu.link', ['url' => 'admin/users', 'icon' => 'fas fa-users', 'label' => 'Users'])

            @include('admin.layouts.menu.link', ['url' => 'admin/teachers', 'icon' => 'fas fa-id-card', 'label' => 'Teachers'])

            <div class="dropdown-divider"></div>

            @include('admin.layouts.menu.group', [
                'icon' => 'fas fa-book', 'label' => 'Reads',
                'urls' => [
                    'admin/reads/topics' => 'Topics',
                    'admin/reads/articles' => 'Articles',
                    'admin/reads/books' => 'Books']])

            @include('admin.layouts.menu.group', [
                'icon' => 'fas fa-child', 'label' => 'Asanas',
                'urls' => [
                    'admin/asana-types' => 'Types',
                    'admin/asana-subtypes' => 'Sub Types',
                    'admin/asanas' => 'Poses']])


            @include('admin.layouts.menu.link', ['url' => 'admin/wallpapers', 'icon' => 'fas fa-images', 'label' => 'Wallpapers'])

            <div class="dropdown-divider"></div>

            @include('admin.layouts.menu.link', ['url' => 'admin/categories', 'icon' => 'fas fa-list-ul', 'label' => 'Categories'])
            
            @else
            
            @include('admin.layouts.menu.link', ['url' => 'admin/teachers/'.auth()->user()->teacher->slug, 'icon' => 'fas fa-user', 'label' => 'My profile'])
            
            @endmanager
            
            @include('admin.layouts.menu.group', [
                'icon' => 'fas fa-video', 'label' => 'Classes',
                'urls' => [
                    'admin/classes' => 'Single Classes',
                    'admin/programs' => 'Programs']])

            <li class="navigation__sub {{checkActive(['admin/routines/pending', 'admin/routines/active'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-calendar-alt mr-2"></i>Routines
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    @manager
                    <li class="{{checkActive(['admin/teachers/questionaire'])}}"><a href="/admin/teachers/questionaire">All questionaires</a></li>
                    @endmanager
                    @if(auth()->user()->teacher()->exists())
                        @if(auth()->user()->teacher->questionaire()->exists())
                        <li class="{{checkActive(['/admin/teachers/questionaire/show'])}}"><a href="/admin/teachers/{{auth()->user()->teacher->slug}}/questionaire/show">My questionaire</a></li>
                        @else
                        <li class="{{checkActive(['/admin/teachers/questionaire/create'])}}"><a href="/admin/teachers/{{auth()->user()->teacher->slug}}/questionaire/create">My questionaire</a></li>
                        @endif
                    @endif
                    <li class="{{checkActive(['admin/routines/pending'])}}">
                        <a href="/admin/routines/pending">New requests
                            @if($numberOfNewRequests > 0)
                            <span class="badge badge-light ml-2">{{$numberOfNewRequests}}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{checkActive(['admin/routines/active'])}}"><a href="/admin/routines/active">Active routines</a></li>
                </ul>
            </li>

            @include('admin.layouts.menu.link', ['url' => 'admin/courses', 'icon' => 'fas fa-graduation-cap', 'label' => 'Courses'])

        </ul>
    </div>
</nav>