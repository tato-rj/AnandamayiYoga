<div class="d-flex flex-wrap">
        @for($i=0; $i<config('routine.duration'); $i++)
        <div class="p-1" style="width: 14.285%">
                <div class="rounded border h-100">
                        <label class="px-2 py-1 m-0 border-bottom w-100 d-flex justify-content-between">
                                <small><strong>{{weekDay($i)}}</strong></small>
                                <small>{{generateCalendar($user->activeRoutine()->schedules->first()->day, $i)->day}}</small>
                        </label>
                        <div class="px-2 py-1">
                                @if(count($user->classesOn(generateCalendar($user->activeRoutine()->schedules->first()->day, $i))))
                                        @foreach($user->classesOn(generateCalendar($user->activeRoutine()->schedules->first()->day, $i)) as $schedule)

                                        <a title="{{$schedule->lesson['name']}}" href="{{route('user.routine.show', [$schedule->routine->id, $schedule->lesson->slug])}}" class="link-default m-0 clamp-1"><small><i class="fas fa-sm fa-video mr-1"></i>{{$schedule->lesson['name']}}</small></a>

                                        @endforeach
                                @else

                                <p class="text-muted m-0"><small>No classes</small></p>                  

                                @endif
                        </div>
                </div>
        </div>
        @endfor
</div>
