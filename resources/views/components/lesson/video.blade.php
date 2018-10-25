<div class="position-relative rounded t-2 move-item-up w-100 bg-full mb-3" style="border: .5rem solid white; background: black; height: 500px">
	@if ($mainLesson->is_free || auth()->check())
		<video id="lesson" class="video-js w-100 h-100" data-url="{{route('discover.classes.record-view', $mainLesson->slug)}}" controls preload="auto" poster="{{asset('videos/demo.jpg')}}" data-setup='{}'>
			<source src="{{asset('videos/demo.mp4')}}" type='video/mp4'>
			<source src="demo.webm" type='video/webm'>
		</video>
	@else
	<div class="overlay-dark w-100 h-100 bg-dark z-0"></div>	
	<div class="d-flex flex-column align-items-center justify-content-center w-100 h-100 bg-full z-10" style="background-image:url({{$mainLesson->image()}})">
		<p class="text-white z-10"><strong>Only members can view this lesson</strong></p>
		<a data-toggle="modal" data-target="#login" href="" class="btn btn-light z-10"><strong>Click to login</strong></a>
	</div>
	@endif
	@include('components/lesson/video/overlays')
</div>