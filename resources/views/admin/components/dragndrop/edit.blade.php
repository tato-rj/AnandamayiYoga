@component('admin/components/dragndrop/layout', ['lessons' => $lessons])

@slot('existingLessons')
  {{-- EDIT ROUTINE SCHEDULES --}}
  @if(isset($schedule))
    <input class="invisible position-absolute" type="checkbox" name="lessons" checked value="{{$request->first_week[$loop->index]}}">
    <input class="invisible position-absolute" type="checkbox" name="lessons" checked value="{{$schedule->time}}">
    @forelse($request->user->classesOn($request->first_week[$loop->index]) as $day)
      @component('admin/components/dragndrop/item', [
        'type' => 'checkbox',
        'lesson' => $day->lesson
      ])
      @endcomponent
    @empty
    
    @endforelse
  @endif
  {{-- EDIT PROGRAMS --}}
  @if(isset($program))
    @forelse($program->lessons as $lesson)
      @component('admin/components/dragndrop/item', [
        'type' => 'checkbox',
        'lesson' => $lesson
      ])
      @endcomponent
    @empty
      <li></li>
    @endforelse
  @endif

@endslot

@endcomponent
