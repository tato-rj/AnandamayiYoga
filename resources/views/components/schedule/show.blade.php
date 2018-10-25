<div class="col-12 mb-4">
    <div class="row no-gutters schedule">
        @foreach($nextFourDays as $date)
            @component('components/schedule/layout', [
                'day' => $date['label'],
                'style' => ($loop->first) ? 'shadow' : 'schedule-future',
                'time' => count(auth()->user()->classesOn($date['day'])) ? auth()->user()->classesOn($date['day'])->first()->time : ''
            ])
            @slot('lessons')
                @if(count(auth()->user()->classesOn($date['day'])))
                @foreach(auth()->user()->classesOn($date['day']) as $schedule)
                    @include('components/schedule/lesson', ['routine' => $schedule])
                @endforeach
                @else
                <div class="px-4 py-3 border-bottom">
                    <p class="text-muted m-0 text-center"><small>No classes scheduled for this day</small></p>
                </div>                  
                @endif
            @endslot
            @endcomponent
        @endforeach
    </div>
</div>