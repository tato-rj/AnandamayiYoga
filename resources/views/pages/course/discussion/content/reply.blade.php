<div class="{{$loop->last ? null : 'border-bottom'}} mx-4 mb-3 pb-3">
	<div class="d-flex justify-content-between">
		<p><small>replied by {{$reply->creator->fullName}} <span class="text-muted">{{$reply->created_at->diffForHumans()}}</span></small></p>
		<div>
			@can('update', $reply)
			@include('components/buttons/delete', ['path' => route('user.course.discussion.reply.destroy', [$course->slug, $discussion->id, $reply->id])])
			@endcan
		</div>
	</div>
	<p class="m-0">{{$reply->body}}</p>
</div>