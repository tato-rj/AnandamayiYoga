<div class="row">
	<section class="col-12 bg-full" style="background-image:url({{cloud($program->image_path)}})">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="text-white z-10 row mt-5 py-5">
			<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">

				@include('components/buttons/return', [
					'path' => route('discover.programs.index'),
					'label' => 'back to our programs',
					'style' => 'link-none'])

				<h1 class="mb-1"><strong>{{$program->name}}</strong></h1>
		        @if($program->teacher()->exists())
		        <div>
		            <p><small>with <a href="{{route('teachers.show', $program->teacher->slug)}}" class="link-none"><strong>{{$program->teacher->fullName}}</strong></a></small></p>
		        </div>
		        @endif
					<div>
						<p class="lead">{{$program->description}}</p>
						<hr class="bg-light my-4">
						<div class="d-flex justify-content-between">
							<p>
								<strong>Share this program on</strong>
								<a class="link-none" href="#"><i class="t-2 ml-2 mr-1 fab fa-lg fa-facebook-f"></i></a>
								<a class="link-none" href="#"><i class="t-2 ml-2 mr-1 fab fa-lg fa-twitter"></i></a>
								<a class="link-none" href="#"><i class="t-2 ml-2 mr-1 fab fa-lg fa-instagram"></i></a>
							</p>
							@auth	
							<div>
					            @include('components/icons/heart-action', [
					            	'icon' => $program->isFavorited() ? 'fas' : 'far',
					            	'color' => 'white',
					            	'favorited_id' => $program->id,
					            	'favorited_type' => get_class($program),
					            	'label' => $program->isFavorited() ? 'Favorited!' : 'Add to favorites'])

							</div>
							@endauth				
						</div>
					<div class="d-flex flex-wrap align-items-end justify-content-between">
						<div class="d-flex flex-wrap align-items-center mt-4">
							<div class="d-flex justify-content-center flex-column align-items-center">
								<i class="mb-2 far fa-2x mr-1 fa-clock"></i>
								<p class="lead m-0">{{secondsToTime($program->duration)}}</p>
							</div>
							<div class="d-flex justify-content-center flex-column align-items-center mx-3">
								<i class="mb-2 fas fa-2x mr-1 fa-video"></i>
								<p class="lead m-0">{{$program->lessons_count}} lessons</p>
							</div>
							<div class="d-flex justify-content-center flex-column align-items-center">
								@auth
									<i class="mb-2 fas fa-calendar-check fa-2x mr-1"></i>
									<p class="lead m-0">{{$program->progress(auth()->user())}}% complete</p>
								@endauth
							</div>
						</div>
					<div class="mb-2">

	                @component('components/buttons/simple', [
	                    'label' => 'MY DASHBOARD',
	                    'color' => 'red',
	                    'weight' => 'bold',
	                    'extra' => 'mobile-block'])

						@if($program->isCompleted())

							@slot('path')
							{{$program->path()}}/{{$list[0]}}
							@endslot
							@slot('label')
							<i class="fas mr-3 fa-play"></i>PROGRAM COMPLETED!
							@endslot
						
						@elseif(!$program->isCompleted() && $program->progress() > 0)

							@slot('path')
							{{$program->lessonPath($program->lessonLeftOff())}}
							@endslot
							@slot('label')
							<i class="fas mr-3 fa-play"></i>CONTINUE PROGRAM
							@endslot
						
						@else
						
							@auth
								@slot('path')
								{{$program->path()}}/{{$list[0]}}
								@endslot
								@slot('label')
								<i class="fas mr-3 fa-play"></i>START PROGRAM
								@endslot
							@else
								@slot('path')
								{{$program->path()}}/{{$list[0]}}
								@endslot
								@slot('label')
								LOGIN TO START
								@endslot
								@slot('attr')
								data-toggle="modal" data-target="#login"
								@endslot							
							@endauth

						@endif

					@endcomponent
					
					</div> 
					</div>      		
				</div>
		</div>
	</section>
</div>