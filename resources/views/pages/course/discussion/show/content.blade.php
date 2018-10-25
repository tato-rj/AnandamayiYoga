<div id="scroll-mark" class="row mb-5">
	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
		<div class="my-5">
			<div class="d-flex align-items-center mb-3">
				<img class="rounded-circle mr-4" src="{{$discussion->creator->avatar()}}" style="width: 88px">
				<div class="flex-grow-1">
					<p class="mb-1"><strong>{{$discussion->subject}}</strong></p>
					<p class="m-0"><small>by {{$discussion->creator->first_name}} <span class="text-muted">{{$discussion->created_at->diffForHumans()}}</span></small></p>
				</div>
				<div>
					@can('update', $discussion)
					@include('components/buttons/delete', ['path' => route('user.course.discussion.destroy', [$course->slug, $discussion->id])])
					@endcan
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

		<div class="mb-5">
			<form method="POST" action="{{route('user.course.discussion.reply.store', [$course->slug, $discussion->id])}}">
				{{csrf_field()}}
				<div class="form-group">
					<textarea required class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="3" name="body" placeholder="Join the discussion..."></textarea>
	            @if ($errors->has('body'))
	            <div class="invalid-feedback">
	              {{ $errors->first('body') }}
	            </div>
	            @endif
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-xs btn-outline-red">Save my reply</button>
				</div>
			</form>
		</div>

		<div class="mb-4 rounded {{$discussion->replies()->exists() ? 'bg-light' : null}} pt-3">
			@forelse($discussion->replies as $reply)
				@include('pages/course/discussion/content/reply')
			@empty
			<p class="text-center">This discussion has no replies. <strong>Join the discussion</strong> and you'll be the first!</p>
			@endforelse
		</div>
	</div>
</div>