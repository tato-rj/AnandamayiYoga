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
			<h5 class="card-title text-muted m-0">Well done, you've completed this lesson!</h5>
		</div>
	</div>
</div>

<div id="paused" style="display: none!important;" class="absolute-center w-100 h-100 align-items-center justify-content-center">
	<div class="overlay-dark w-100 bg-dark z-0 h-100"></div>
	<div class="text-white text-center z-10">
		<h1 id="remainingTime" class="display-1"></h1>
		<h2 class="mb-4">MIN. REMAINING</h2>
		<div style="border-top: 2px solid white; width: 25%; margin: 0 auto"></div>
		<div class="mt-3">
			<div id="feedback-question">
				<p class="lead">Are you enjoying this lesson?</p>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" class="positive btn btn-blue m-1">YES</button>
				<button class="negative btn btn-blue m-1">NO</button>
			</div>
			<div id="feedback-more" style="display: none;">
				<p class="lead">Sorry to hear that! Do you think this lesson is...</p>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" value="This lesson was too hard" class="negative-submit btn btn-blue m-1">Too hard</button>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" value="This lesson was too easy" class="negative-submit btn btn-blue m-1">Too easy</button>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" value="This lesson was too long" class="negative-submit btn btn-blue m-1">Too long</button>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" value="This lesson was too short" class="negative-submit btn btn-blue m-1">Too short</button>
				<button data-url="{{route('feedback.store')}}" data-lesson_id="{{$mainLesson->id}}" value="I didn't like this lesson" class="negative-submit btn btn-blue m-1">Other</button>
			</div>
			<div id="feedback-thanks" style="display: none;">
				<h5><i class="fas mr-2 fa-thumbs-up"></i><strong>Thanks for your feedback</strong></h5>
				<p class="px-4">This will helps us improve our platform and improve your overall experience :)</p>
			</div>		
		</div>
	</div>
</div>