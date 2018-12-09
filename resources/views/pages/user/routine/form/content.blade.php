<section id="scroll-mark" class="container py-5">
	@if(auth()->user()->pendingRoutine())

	<div class="row">	
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">
	
	    @include('components/buttons/return', [
	        'path' => '/me',
	        'label' => 'return to my dashboard'])
	
			<div class="text-center jumbotron bg-light p-4">
				<p class="lead">You have a pending request from {{auth()->user()->pendingRoutine()->created_at->diffForHumans()}}</p>
				<p class="text-muted m-0"><small>Please wait until your current request is completed before you submit a new one, thank you!</small></p>
			</div>
		</div>
	</div>	
	
	@elseif(auth()->user()->activeRoutine())

	<div class="row">	
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">

		    @include('components/buttons/return', [
		        'path' => '/me',
		        'label' => 'return to my dashboard'])

			<div class="text-center jumbotron bg-light p-4">
				<p class="lead">You have an active routine right now.</p>
				<p class="text-muted m-0"><small>Please wait until your routine is completed before you submit a new one, thank you!</small></p>
			</div>
		</div>
	</div>

	@else
	
	<div class="row mb-6">	
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">
			@include('pages.user.routine.form.sections.title', [
				'title' => __('HOW WOULD YOU LIKE YOUR SCHEDULE TO LOOK LIKE?'),
				'subtitle' => __('Select below which days and times work best for you.')])
		</div>

		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">
			@include('pages/user/routine/form/sections/schedule')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 mx-auto">
			<form method="POST" id="routine-form" action="{{route('user.routine.store')}}">
				@csrf
				<input type="hidden" name="schedule">
				<input type="hidden" name="teacher_id" value="{{$teacher->id}}">
				@include('pages.user.routine.form.sections.questions')

			</form>
		</div>
	</div>

	@endif
</section>