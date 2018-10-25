<a href="{{route('user.course.discussion.show', [$course->slug, $discussion->id])}}" class="link-none">
	<div class="rounded p-4 border mb-4 t-2 hover-shadow-light">
		<div class="d-flex align-items-center mb-3">
			<img class="rounded-circle mr-4" src="{{$discussion->creator->avatar()}}" style="width: 88px">
			<div>
				<p class="mb-1"><strong>{{$discussion->subject}}</strong></p>
				<p class="m-0"><small>by {{$discussion->creator->first_name}} <span class="text-muted">{{$discussion->created_at->diffForHumans()}}</span></small></p>
			</div>
		</div>
		<div>
			<p>{{$discussion->body}}</p>
		</div>
		<div class="d-flex justify-content-between">
			<p class="m-0 text-muted"><small>
				@if($discussion->chapter()->exists())
				Related to <strong>{{$discussion->chapter->name}}</strong>
				@endif
			</small></p>
			<p class="m-0 text-muted"><small>{{$discussion->replies()->count()}} {{str_plural('reply', $discussion->replies()->count())}}</small></p>
		</div>
	</div>
</a>