@component('pages/user/dashboard/sections/layout', ['title' => 'My Favorite Classes'])

	@slot('elements')
		@if(!$favoriteLessons->isEmpty())
			@foreach($favoriteLessons->take($limit) as $lesson)
			    @include('components/lesson/card', [
			    	'lesson' => $lesson,
			    	'sizes' => null
			    ])

			    @if($loop->last && !is_null($limit) && $limit < count($favoriteLessons))
			    	<a href="{{route('user.favorites')}}" class="btn btn-block btn-light text-muted mt-2">
			    		<i class="fas mr-2 fa-plus"></i>VIEW ALL
			    	</a>
			    @endif
			@endforeach
		@else
			<div>
				<p class="m-4 text-muted">
					<i class="fas mr-2 text-warning fa-exclamation-circle"></i>You haven't favorited any classes yet. 
					<a href="{{route('discover.classes.index')}}" class="link-default">Browse</a> our classes collection.
				</p>
			</div>
		@endif
	@endslot
@endcomponent