<div class="p-2 d-flex justify-content-between flex-wrap">
    <div>
        @if(isset($program))
            <h4 class="mb-0"><a href="{{$program->path()}}" class="link-default">{{$program->name}}</a></h4>
            <h4 class="text-muted mb-3"><strong>Lesson {{$currentIndex}}</strong></h4>
        @endif

        <div class="d-flex align-items-center flex-wrap">
            <h4 class="mr-4"><strong>{{$mainLesson->name}}</strong></h4>
            <div class="d-flex align-items-center">
                <h5 class="mr-3"><a class="link-none" href="#"><i class="t-2 fab fa-facebook-f text-facebook"></i></a></h5>
                <h5 class="mr-3"><a class="link-none" href="#"><i class="t-2 fab fa-twitter text-twitter"></i></a></h5>
                <h5 class="mr-3"><a class="link-none" href="#"><i class="t-2 fab fa-instagram text-instagram"></i></a></h5>
            </div>
        </div>
        @if($mainLesson->teacher()->exists())
        <div>
            <p><small>with <a href="{{route('teachers.show', $mainLesson->teacher->slug)}}" class="link-none"><strong>{{$mainLesson->teacher->name}}</strong></a></small></p>
        </div>
        @endif
        <div class="text-muted d-flex align-items-center mb-2">
            <p class="mr-3 mb-0">
                <i class="far fa-clock mr-2"></i>{{secondsToTime($mainLesson->duration)}} 
            </p>
            <div>
                @include('components/lesson/levels', ['lesson' => $mainLesson])
            </div>
        </div>          
    </div>

    @auth
    <div class="mr-1 text-nowrap my-1 mb-3">

        @include('components/icons/heart-action', [
            'icon' => $mainLesson->isFavorited() ? 'fas' : 'far',
            'favorited_id' => $mainLesson->id,
            'favorited_type' => get_class($mainLesson),
            'label' => $mainLesson->isFavorited() ? 'Favorited!' : 'Add to Favorites'])

    </div>
    @endauth
</div>
@if(auth()->check() && auth()->user()->completedLessons->contains($mainLesson))
<div class="mx-2">
    <p class="text-success">You last viewed this lesson <strong>{{auth()->user()->lastTimeCompleted($mainLesson)->diffForHumans()}}</strong></p>
</div>
@endif
<div class="mx-1">
    @foreach($mainLesson->categories as $category)
    <a href="{{route('discover.classes.index')}}?style={{$category->slug}}" class="badge t-2 p-2 m-1 badge-light">{{$category->name}}</a>
    @endforeach
</div>
<div class="px-2 py-4">
    <p>{{$mainLesson->description}}</p>         
</div>