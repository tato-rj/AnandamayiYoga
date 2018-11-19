@component('pages/user/settings/show', ['title' => 'Preferences'])

<div id="preferences-container">
	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>My current Yoga level is</strong>
			@if(!auth()->user()->level)
			<span class="text-warning">(you haven't selected your level)</span>
			@endif
		</small></p>
		@foreach($levels as $level)
			<button class="rounded-0 bounce-to-right position-relative btn-light text-muted btn unique select-class m-2 
			@if($level->id == auth()->user()->level_id)
			bounce-to-right-active
			@endif
			" data-id="{{$level->id}}" data-route="{{route('user.update.level', $level->id)}}">{{$level->name}}
			</button>
		@endforeach
		<p class="ml-2 select-error" style="display: none;"><small class="text-muted">Sorry, we could not select your level. Please <a href="#" class="link-default">click here</a> to report this problem. Thank you!</small></p>
	</div>

	<div class="my-4">
		<p class="border-bottom px-2 py-1 rounded"><small><strong>These are my favorite styles</strong>
			@if(count(auth()->user()->categories) == 0)
			<span class="text-warning">(you haven't told us which styles you like)</span>
			@endif
		</small></p>
		@foreach($categories as $category)
			<button class="bounce-to-right rounded-0 position-relative btn-light text-muted btn select-class m-2 
			@if(auth()->user()->hasCategory($category->id))
			bounce-to-right-active
			@endif
			" data-id="{{$category->id}}" data-route="{{route('user.update.category', $category->id)}}">{{$category->name}}
				<small><i style="display: none;" class="fas text-success absolute-top-right fa-check tiny"></i></small>
			</button>
		@endforeach
		<p class="ml-2 select-error" style="display: none;"><small class="text-muted">Sorry, we could not select your category. Please <a href="#" class="link-default">click here</a> to report this problem. Thank you!</small></p>
	</div>
</div>
@endcomponent