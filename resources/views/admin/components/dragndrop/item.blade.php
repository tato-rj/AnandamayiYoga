<li class="rounded bg-light ordered px-2 py-1 mb-1 cursor-pointer d-flex justify-content-between" 
	data-path="{{route('admin.classes.update', $lesson->id)}}"
	data-name="lessons[]">
	<input class="invisible position-absolute" type="{{$type ?? null}}" checked value="{{$lesson->id}}">
	<p class="m-0 clamp-1">
		<small><i class="fas fa-bars mr-2"></i>{{$lesson->name}}</small>
	</p>
</li>