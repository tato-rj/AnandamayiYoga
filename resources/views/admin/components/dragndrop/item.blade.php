<li class="rounded bg-light ordered px-2 py-1 mb-1 cursor-pointer d-flex justify-content-between" 
	data-path="{{route('admin.classes.update', $lesson->id)}}"
	data-name="lessons[]">
	<input class="invisible position-absolute" type="{{$type ?? null}}" checked value="{{$lesson->id}}">
	<div class="d-flex w-100 align-items-center justify-content-between">
		<p class="m-0 clamp-1">
			<small><i class="fas fa-bars mr-2"></i>{{$lesson->name}}</small>
		</p>
		@if($lesson->is_free)
		<div><small><span class="badge badge-pill badge-success">free</span></small></div>
		@endif
	</div>
</li>