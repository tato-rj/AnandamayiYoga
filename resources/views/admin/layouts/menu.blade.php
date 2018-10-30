<nav class="sidebar">
    <div class="scrollbar-inner">

        <ul class="navigation">
            <li class="{{checkActive(['office'])}}"><a href="/office" class="d-flex align-items-center"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>

            <li class="navigation__sub {{checkActive(['office/statistics', 'office/subscriptions', 'office/feedbacks'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-chart-line mr-2"></i>Reports
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['office/statistics'])}}"><a href="/office/statistics">Statistics</a></li>
                    <li class="{{checkActive(['office/subscriptions'])}}"><a href="/office/subscriptions">Subscriptions</a></li>
                    <li class="{{checkActive(['office/feedbacks'])}}"><a href="/office/feedbacks">Feedbacks</a></li>
                </ul>
            </li>

            <li class="{{checkActive(['office/users'])}}"><a href="/office/users" class="d-flex align-items-center"><i class="fas fa-users mr-2"></i>Users</a></li>

            <li class="{{checkActive(['office/teachers'])}}"><a href="/office/teachers" class="d-flex align-items-center"><i class="fas fa-id-card mr-2"></i>Teachers</a></li>

            <div class="dropdown-divider"></div>

            <li class="navigation__sub {{checkActive(['office/articles', 'office/articles/blog', 'office/article-topics'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-book mr-2"></i>Reads
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['office/articles'])}}"><a href="/office/articles">Articles</a></li>
                    <li class="{{checkActive(['office/articles/blog'])}}"><a href="/office/articles/blog">Blog</a></li>
                    <li class="{{checkActive(['office/article-topics'])}}"><a href="/office/articles/topics">Topics</a></li>
                </ul>
            </li>

            <li class="navigation__sub">
                <a href="" class="d-flex align-items-center"><i class="fas fa-images mr-2"></i>Wallpapers
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    @foreach($wallpaperCategories as $wpCategory)
                    <li class="{{checkActive(["office/wallpapers/category/{$wpCategory->id}"])}}"><a href="{{route('admin.wallpapers.create', $wpCategory->id)}}">{{$wpCategory->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="navigation__sub {{checkActive(['office/asanas', 'office/asana-types'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-child mr-2"></i>Asanas
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['office/asana-types'])}}"><a href="/office/asana-types">Types</a></li>
                    <li class="{{checkActive(['office/asana-subtypes'])}}"><a href="/office/asana-subtypes">Sub Types</a></li>
                    <li class="{{checkActive(['office/asanas'])}}"><a href="/office/asanas">Poses</a></li>
                </ul>
            </li>
            
            <div class="dropdown-divider"></div>

            <li class="navigation__sub {{checkActive(['office/routines/pending', 'office/routines/active'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-calendar-alt mr-2"></i>Routines
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['office/routines/pending'])}}">
                        <a href="/office/routines/pending">New requests
                            @if($numberOfNewRequests > 0)
                            <span class="badge badge-light ml-2">{{$numberOfNewRequests}}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{checkActive(['office/routines/active'])}}"><a href="/office/routines/active">Active routines</a></li>
                </ul>
            </li>

            <li class="navigation__sub {{checkActive(['office/categories', 'office/classes', 'office/programs'])}}">
                <a href="" class="d-flex align-items-center"><i class="fas fa-video mr-2"></i>Classes
                    <small><i class="ml-2 fas fa-caret-down"></i></small>
                </a>
                <ul>
                    <li class="{{checkActive(['office/categories'])}}"><a href="/office/categories">Categories</a></li>
                    <li class="{{checkActive(['office/classes'])}}"><a href="/office/classes">Single Classes</a></li>
                    <li class="{{checkActive(['office/programs'])}}"><a href="/office/programs">Programs</a></li>
                </ul>
            </li>

            <li class="{{checkActive(['office/courses'])}}"><a href="/office/courses" class="d-flex align-items-center"><i class="fas fa-graduation-cap mr-2"></i>Courses</a></li>

        </ul>
    </div>
</nav>