<div class="row my-5">
	<div class="{{$margin or null}} col-12 border-bottom d-flex justify-content-between align-items-center">
		<h3>{{$title}}</h3>
		{{$extra or null}}
	</div>
	<div class="col-12">{{$note or null}}</div>
    {{$elements}}
</div>