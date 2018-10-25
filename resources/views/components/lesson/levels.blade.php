@if($lesson->hasAllLevels())
    <span class="badge badge-all">All Levels</span>
@else
    @foreach($lesson->levels as $level)
    <span class="badge badge-{{strtolower(firstThree($level->name))}}">{{$level->name}}</span>
    @endforeach
@endif
