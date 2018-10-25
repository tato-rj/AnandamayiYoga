<section id="scroll-mark" class="row bg-full position-relative" style="background-image:url({{cloud('app/images/backgrounds/studio.jpg')}})">
	<div class="overlay-dark w-100 h-100 bg-light z-0"></div>
	<div class="container" style="min-height: 300px">
		<div style=" height: 300px" class="row align-items-center justify-content-center">
			<button id="show-preview" class="btn-not-bold btn-lg btn-outline-red z-10">HERE IS A QUICK PREVIEW</button>
		</div>
		<div class="row" id="preview-container" style="display: none; height: 600px;">
			<video id="preview-video" class="video-js w-100 h-100" controls preload="auto">
				<source src="{{cloud($model->video_path)}}" type='video/mp4'>
			</video>
		</div>
	</div>
</section>