@if($lesson->hasAllLevels())
    <span class="badge badge-all">@lang('All Levels')</span>
@else
    @foreach($lesson->levels as $level)
    <span class="badge badge-{{strtolower(firstThree($level->slug))}}">{{$level->name}}</span>
    @endforeach
@endif
