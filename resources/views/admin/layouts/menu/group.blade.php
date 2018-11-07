<li class="navigation__sub {{checkActive(array_keys($urls))}}">
    <a href="" class="d-flex align-items-center"><i class="{{$icon}} mr-2"></i>{{$label}}
        <small><i class="fas fa-caret-down ml-2"></i></small>
    </a>
    <ul>
        @foreach($urls as $url => $label)
            <li class="{{checkActive([$url])}}"><a href="/{{$url}}">{{$label}}</a></li>
        @endforeach
    </ul>
</li>