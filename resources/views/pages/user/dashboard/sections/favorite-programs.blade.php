@component('pages/user/dashboard/sections/layout', ['title' => 'My Favorite Programs'])

	@slot('elements')
		@if(!$favoritePrograms->isEmpty())

			@foreach($favoritePrograms->take($limit) as $program)
	            @include('components/program/card', ['program' => $program])

			    @if($loop->last && !is_null($limit) && $limit < count($favoritePrograms))
			    	<a href="{{route('user.favorites')}}" class="btn btn-block btn-light text-muted mt-2">
			    		<i class="fas mr-2 fa-plus"></i>VIEW ALL
			    	</a>
			    @endif
			@endforeach

		@else
			<div>
				<p class="m-4 text-muted">
					<i class="fas mr-2 text-warning fa-exclamation-circle"></i>You haven't favorited any programs yet. 
					<a href="{{route('discover.programs.index')}}" class="link-default">Browse</a> our programs collection.
				</p>
			</div>
		@endif
	@endslot

@endcomponent
