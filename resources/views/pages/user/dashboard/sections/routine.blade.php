@component('pages/user/dashboard/sections/layout', ['margin' => 'mb-4'])
	@slot('title')
	My 4-week Yoga Routine <span id="recommendations-count" class="text-muted" style="font-size: 0.5em"></span>
	@endslot

	@slot('extra')
		@if(auth()->user()->activeRoutine())
		<p class="text-blue cursor-pointer m-0 d-none d-sm-block" data-toggle="collapse" data-target="#full-schedule">
			<i class="fas mr-2 fa-calendar-alt"></i>View entire program
		</p>
		@endif
	@endslot
	
	@slot('elements')
	@if(auth()->user()->pendingRoutine())
		<p class="m-4 text-success">
			<i class="fas mr-2 fa-check-circle"></i> 
			Your request for a 4-week Yoga Routine was received <strong>{{auth()->user()->pendingRoutine()->created_at->diffForHumans()}}</strong> and we're working on it! We'll let you know when it's ready :)
		</p>
	@elseif(auth()->user()->activeRoutine())
		@if(auth()->user()->activeRoutine()->schedules->first()->day->diffInDays(\Carbon\Carbon::now()) >= 0 && auth()->user()->activeRoutine()->views_count == 0)
			<p class="text-success mx-auto" role="alert">
				Your program starts on <strong>{{auth()->user()->activeRoutine()->schedules->first()->day->format('l, M dS')}}</strong>. We'll see you then!
			</p>
		@endif

		@include('components/schedule/show')

		<div id="full-schedule" class="collapse">
			@component('components/schedule/summary', ['user' => auth()->user()])
			@endcomponent
		</div>

	@else
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 mx-auto">			
		<div class="bg-light rounded p-4 text-center">
			<p class="mb-3 text-muted">Let us help you organize your schedule and prepare your <strong>4-week Yoga Routine</strong>!</p>

            @include('components/buttons/simple', [
                'path' => route('user.routine.instructions'),
                'label' => 'Create my Yoga Routine',
                'color' => 'red',
                'weight' => 'bold'])
                
		</div>
	</div>
	@endif
	@endslot
@endcomponent


