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

            <li class="navigation__sub">
                <a href="" class="d-flex align-items-center"><i class="fas fa-images mr-2"></i>Wallpapers
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    @foreach($wallpaperCategories as $wpCategory)
                    <li class="{{checkActive(["admin/wallpapers/category/{$wpCategory->id}"])}}"><a href="{{route('admin.wallpapers.create', $wpCategory->id)}}">{{$wpCategory->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            @include('admin.layouts.menu.group', [
                'icon' => 'fas fa-child', 'label' => 'Asanas',
                'urls' => [
                    'admin/asana-types' => 'Types',
                    'admin/asana-subtypes' => 'Sub Types',
                    'admin/asanas' => 'Poses']])
            
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