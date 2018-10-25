<div id="video-container" class="position-relative w-100" style="border: none; height: 580px">

	<video id="lesson" class="video-js w-100 h-100" data-url="{{route('user.course.chapter.answer.submit', [$chapter->course->slug, $chapter->id, $content->type, $content->id])}}" controls preload="auto" data-setup='{}'>
		<source src="{{cloud($content->video_path)}}" type='video/mp4'>
	</video>

	<div id="completed" style="display: none!important;" class="absolute-center w-100 h-100 d-flex align-items-center justify-content-center">
		<div class="overlay-dark w-100 bg-dark z-0 h-100"></div>
		<div class="card text-center" style="width: 18rem;">
			<div class="card-body z-10">
				<div class="check_mark">
					<div class="sa-icon sa-success animate">
						<span class="sa-line sa-tip animateSuccessTip"></span>
						<span class="sa-line sa-long animateSuccessLong"></span>
						<div class="sa-placeholder"></div>
						<div class="sa-fix"></div>
					</div>
				</div>
				<h5 class="card-title text-muted m-0">Well done, you've completed this {{$content->type}}!</h5>
			</div>
		</div>
	</div>
</div>		
