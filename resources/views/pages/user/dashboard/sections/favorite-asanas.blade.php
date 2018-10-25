@component('pages/user/dashboard/sections/layout', ['title' => 'My Favorite Asanas'])

	@slot('elements')
		@if(!$favoriteAsanas->isEmpty())
			@foreach($favoriteAsanas->take($limit) as $asana)
			    
			    @include('components/asana/card', ['asana' => $asana])

			    @if($loop->last && !is_null($limit) && $limit < count($favoriteAsanas))
			    	<a href="{{route('user.favorites')}}" class="btn btn-block btn-light text-muted mt-2">
			    		<i class="fas mr-2 fa-plus"></i>VIEW ALL
			    	</a>
			    @endif

			@endforeach
		@else
			<div>
				<p class="m-4 text-muted">
					<i class="fas mr-2 text-warning fa-exclamation-circle"></i>You haven't favorited any Asanas yet. 
					<a href="{{route('discover.asanas.index')}}" class="link-default">Browse</a> our Asanas collection.
				</p>
			</div>
		@endif
	@endslot

@endcomponent