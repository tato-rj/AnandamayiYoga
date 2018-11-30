@foreach($list as $category)
<small><a href="{{route('discover.category', $category->slug)}}" class="link-none" style="color: {{randomColor()}}"><strong>{{$category->name}}</strong></a>
@if(! $loop->last) <span class="text-muted">|</span> 
@endif
</small>
@endforeach