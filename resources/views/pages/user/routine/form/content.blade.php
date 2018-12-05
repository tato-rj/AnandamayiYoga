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
	
	<div class="row">	
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">

		    @include('components/buttons/return', [
		        'path' => '/me',
		        'label' => 'return to my dashboard'])
		        
			<div class="text-center mt-5">
				<h5><strong>HOW WOULD YOU LIKE YOUR SCHEDULE TO LOOK LIKE?</strong></h5>
				<p class="text-muted">Click on a day and select the time. You can choose <strong class="text-red"><u>up to 3 days</u></strong> per week.</p>
			</div>
		</div>

		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-10 mx-auto">
			@include('pages/user/routine/form/sections/schedule')
		</div>
	</div>

	<div class="text-center mt-5">
		<h5><strong>TELL US A LITTLE MORE ABOUT YOURSELF...</strong></h5>
		<p class="text-muted">Your answers will help us create the best Yoga routine for you.</p>
	</div>
	<div class="row mt-4">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 mx-auto">
			<form method="POST" id="routine-form" action="{{route('user.routine.store')}}">
				{{csrf_field()}}
				<input type="hidden" name="schedule">
				@include('pages/user/routine/form/sections/lifestyle')
				@include('pages/user/routine/form/sections/preferences')
				@include('pages/user/routine/form/sections/personnal')
				@include('pages/user/routine/form/sections/goals')

		<div class="form-group">
			<label>Teacher</label>
			<select required class="form-control" name="teacher_id">
				<option selected disabled></option>
				@foreach($teachers as $teacher)
				<option value="{{$teacher->id}}">{{$teacher->name}}</option>
				@endforeach
			</select>
		</div>


				<div class="text-center my-5">
					<p class="lead">ALL SET!</p>
					<p class="text-muted">After your schedule is complete, we will follow up with your progress to make sure you love it :)</p>	
					
					@include('components/buttons/spinner', [
						'classes' => 'btn-red mt-4 block-screen-button',
						'label' => 'Prepare my Yoga routine'])
						
				</div>

			</form>
		</div>
	</div>

	@endif
</section>