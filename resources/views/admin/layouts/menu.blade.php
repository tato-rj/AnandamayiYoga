<nav class="sidebar">
    <div class="scrollbar-inner">

        <ul class="navigation">
            <li class="{{checkActive(['admin'])}}"><a href="/admin" class="d-flex align-items-center"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>

            <li class="navigation__sub {{checkActive(['admin/statistics', 'admin/subscriptions', 'admin/feedbacks'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-chart-line mr-2"></i>Reports
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['admin/statistics'])}}"><a href="/admin/statistics">Statistics</a></li>
                    <li class="{{checkActive(['admin/subscriptions'])}}"><a href="/admin/subscriptions">Subscriptions</a></li>
                    <li class="{{checkActive(['admin/feedbacks'])}}"><a href="/admin/feedbacks">Feedbacks</a></li>
                </ul>
            </li>

            <li class="{{checkActive(['admin/users'])}}"><a href="/admin/users" class="d-flex align-items-center"><i class="fas fa-users mr-2"></i>Users</a></li>

            <li class="{{checkActive(['admin/teachers'])}}"><a href="/admin/teachers" class="d-flex align-items-center"><i class="fas fa-id-card mr-2"></i>Teachers</a></li>

            <div class="dropdown-divider"></div>

            <li class="navigation__sub {{checkActive(['admin/reads/learning', 'admin/reads/articles', 'admin/reads/topics'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-book mr-2"></i>Reads
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['admin/reads/learning'])}}"><a href="/admin/reads/learning">Learning</a></li>
                    <li class="{{checkActive(['admin/reads/articles'])}}"><a href="/admin/reads/articles">Articles</a></li>
                    <li class="{{checkActive(['admin/reads/topics'])}}"><a href="/admin/reads/topics">Topics</a></li>
                </ul>
            </li>

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

            <li class="navigation__sub {{checkActive(['admin/asanas', 'admin/asana-types'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-child mr-2"></i>Asanas
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['admin/asanas'])}}"><a href="/admin/asanas">Poses</a></li>
                    <li class="{{checkActive(['admin/asana-types'])}}"><a href="/admin/asana-types">Types</a></li>
                    <li class="{{checkActive(['admin/asana-subtypes'])}}"><a href="/admin/asana-subtypes">Sub Types</a></li>
                </ul>
            </li>
            
            <div class="dropdown-divider"></div>

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

            <li class="navigation__sub {{checkActive(['admin/categories', 'admin/classes', 'admin/programs'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-video mr-2"></i>Classes
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['admin/categories'])}}"><a href="/admin/categories">Categories</a></li>
                    <li class="{{checkActive(['admin/classes'])}}"><a href="/admin/classes">Single Classes</a></li>
                    <li class="{{checkActive(['admin/programs'])}}"><a href="/admin/programs">Programs</a></li>
                </ul>
            </li>

            <li class="{{checkActive(['admin/courses'])}}"><a href="/admin/courses" class="d-flex align-items-center"><i class="fas fa-graduation-cap mr-2"></i>Courses</a></li>

        </ul>
    </div>
</nav>