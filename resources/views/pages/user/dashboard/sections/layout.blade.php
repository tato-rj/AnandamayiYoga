<div class="row my-5">
	<div class="{{$margin ?? null}} col-12 border-bottom d-flex justify-content-between align-items-center">
		<h3>{{$title}}</h3>
		{{$extra ?? null}}
	</div>
	<div class="col-12">{{$note ?? null}}</div>
    {{$elements}}
</div>