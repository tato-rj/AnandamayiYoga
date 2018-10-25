@component('pages/user/dashboard/sections/layout', ['title' => 'My Courses'])

	@slot('elements')
	@forelse(auth()->user()->courses() as $course)
	@include('pages/course/card', ['course' => $course])
	@empty
		<div>
			<p class="m-4 text-muted">
				<i class="fas mr-2 text-warning fa-exclamation-circle"></i>You haven't purchased any courses yet. 
				<a href="{{route('courses.index')}}" class="link-default">Browse</a> through our courses collection.
			</p>
		</div>
	@endforelse
	@endslot

@endcomponent