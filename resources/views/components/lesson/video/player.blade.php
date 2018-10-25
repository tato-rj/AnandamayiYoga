<div id="video-container" class="position-relative rounded t-2 move-item-up w-100 bg-full mb-3" style="">
	
	@if($mainLesson->is_free || (auth()->check() && auth()->user()->can('view', $mainLesson)))
		<video id="lesson" class="video-js w-100 h-100" data-url="{{route('discover.classes.record-view', $mainLesson->slug)}}" controls preload="auto" poster="{{cloud($mainLesson->image_path)}}" data-setup='{}'>
			<source src="{{cloud($mainLesson->video_path)}}" type='video/mp4'>
		</video>
	@else
	<div class="overlay-dark w-100 h-100 bg-dark z-0"></div>	
	<div class="d-flex flex-column align-items-center justify-content-center w-100 h-100 bg-full z-10" style="background-image:url({{cloud($mainLesson->image_path)}})">
		<p class="text-white z-10"><strong>Only members can view this lesson</strong></p>
	</div>
	@endif

	@include('components/lesson/video/overlays')
</div>