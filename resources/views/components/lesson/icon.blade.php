@if(auth()->check() && auth()->user()->completedLessons->contains($lesson))
    <i class="fas text-success fa-3x fa-check-circle"></i>
@else
    <i class="text-white far fa-3x fa-play-circle"></i>
@endif