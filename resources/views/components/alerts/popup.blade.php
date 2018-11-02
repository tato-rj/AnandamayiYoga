<div class="alert alert-popup alert-{{$type}} feedback-alert m-0 position-fixed z-50 bounceInUp animated-fast" 
	 style="bottom: 2em; right: 2em; display: {{$display ?? 'none'}};"
	 id="{{$is_original ? "alert-{$type}-original" : null}}">

	<strong class="mr-1">{{randomGreeting($type)}}</strong>{{$message}}
	
	<button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close" style="color: inherit">
		<span aria-hidden="true">&times;</span>
	</button>

</div>