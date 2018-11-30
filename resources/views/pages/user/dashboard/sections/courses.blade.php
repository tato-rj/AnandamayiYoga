@component('pages/user/dashboard/sections/layout', ['title' => 'My Courses'])

	@slot('elements')
	@forelse(auth()->user()->courses() as $course)
	@include('pages/course/card', ['course' => $course])
	@empty
		<div>
			<p class="m-4 text-muted">
				<i class="fas mr-2 text-warning fa-exclamation-circle"></i>@lang('You haven\'t selected any favorites yet.')
				<a href="{{route('courses.index')}}" class="link-default">@lang('Browse')</a> @lang('through our collection.')
			</p>
		</div>
	@endforelse
	@endslot

@endcomponent