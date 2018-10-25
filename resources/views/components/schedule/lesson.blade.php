<a href="{{$routine->path}}" class="link-none">
	<div class="d-flex align-items-center border-bottom schedule-lesson px-3">
		<div class="text-center pr-3">
			<i class="text-red fa-lg far fa-play-circle"></i>
		</div>
		<div class="py-3 text-truncate">
			<p class="m-0 text-truncate">{{$routine->lesson->name}}</p>
			<p class="m-0"><small><i class="far mr-1 text-muted fa-clock"></i>15 minutes</small></p>
		</div>
	</div>
</a>