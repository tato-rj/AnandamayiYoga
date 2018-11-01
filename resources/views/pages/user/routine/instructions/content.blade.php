<section id="scroll-mark" class="container py-5">

    @title(['title' => 'How do I create my 4-week Yoga Routine?'])

	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
			@component('pages/user/routine/instructions/step', [
				'number' => 1,
				'title' => 'ANSWER OUR QUICK QUESTIONNAIRE'])

				@slot('description')We will create a <strong>peronalized yoga</strong> program for you based on your preferences and availability
				@endslot
			@endcomponent

			@component('pages/user/routine/instructions/step', [
				'number' => 2,
				'title' => 'FOLLOW YOUR CALENDAR'])

				@slot('description')You will be able to <strong>track your schedule</strong> on your dashboard (we will also send you reminders by email about your practice)
				@endslot
			@endcomponent

			@component('pages/user/routine/instructions/step', [
				'number' => 3,
				'title' => 'TAKE YOUR CLASSES - TRACK YOUR PROGRESS!'])

				@slot('description')Here is the fun part! Keep scheduled classes on track to <strong>achieve your goals</strong> and feel the benefit of your commitment
				@endslot
			@endcomponent

		</div>
	</div>
	<div class="row mt-5">
		<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 text-center mx-auto">
			
			<div class="mb-3">
            @include('components/buttons/simple', [
                'path' => route('user.routine.form'),
                'label' => 'LET\'S GET STARTED!',
                'color' => 'red',
                'weight' => 'bold'])
            </div>

			<p class="text-muted"><small>Donec vel fringilla tellus. Suspendisse ultrices eget ante non scelerisque. Nulla vulputate augue risus, nec convallis enim volutpat ut. Maecenas viverra tristique magna, ac imperdiet quam <a href="" class="link-blue">porttitor sit amet</a>.</small></p>
		</div>
	</div>
</section>