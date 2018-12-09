<section id="scroll-mark" class="container py-5">

    @title(['title' => 'Let\'s create your Yoga Routine'])

	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
			<div>
				{!! trixLorem(1) !!}

			</div>
				<p class="mt-5 mb-4 lead text-center">@lang('Who would you like to create your Yoga routine?')</p>
			@foreach($teachers as $teacher)
				@include('components.teacher.display', ['link' => route('user.routine.form', $teacher->slug)])
			@endforeach
		</div>
	</div>
</section>