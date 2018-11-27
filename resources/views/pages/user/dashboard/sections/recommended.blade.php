@component('pages/user/dashboard/sections/layout', ['title' => __('Recommended for you')])

	@slot('extra')
		<a href="{{route('user.settings.preferences')}}" class="link-blue">
			<i class="fas fa-cog"></i><span class="ml-2 d-none d-sm-inline">@lang('Change my preferences')</span>
		</a>
	@endslot
	@if(auth()->user()->hasPreferencesSelected())
		@slot('note')

			<div class="d-flex flex-wrap justify-content-between">
				<p class="text-muted m-0"><small>@lang('Because you like') 
					@foreach(auth()->user()->categories as $category)
					<span class="badge badge-pill badge-light">{{$category->name}}</span>
					@endforeach
				</small></p>
				<p class="m-0 text-muted"><small>@lang('Total of') {{count($recommendations)}} {{str_plural('class', count($recommendations))}}</small></p>		
			</div>

		@endslot	

		@slot('elements')

			@forelse($recommendations->take($limit) as $lesson)
			    @component('components/lesson/card', [
			    	'lesson' => $lesson,
			    	'sizes' => null
			    ])
			    @endcomponent
			    @if($loop->last && !is_null($limit) && $limit < count($recommendations))
			    	<a href="{{route('user.recommended')}}" class="btn btn-block btn-light text-muted mt-2">
			    		<i class="fas mr-2 fa-plus"></i>@lang('VIEW ALL')
			    	</a>
			    @endif
			@empty
				<div>			
					<p class="m-4 text-muted jumbotron p-4">
						@lang('Sorry, looks like we couldn\'t find any lessons that match your preferred level and categories! Please') <a href="#" class="link-default">@lang('click here')</a> @lang('to let us know about this and we will create new content for you') :)
					</p>
				</div>
			@endforelse

		@endslot
	@else
		@slot('elements')

			<div>			
				<p class="m-4 text-muted">
					<i class="fas mr-2 text-warning fa-exclamation-circle"></i>
					@lang('We don\'t know much about you yet. Select your preferred level and styles') <a href="{{route('user.settings.preferences')}}" class="link-default">@lang('here')</a>.
				</p>
			</div>
				
		@endslot
	@endif
@endcomponent