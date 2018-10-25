<div class="row">
	<section class="col-12 bg-full d-flex align-items-end" style="background-image:url({{cloud($teacher->cover_path)}}); height: 60vh;">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
	</section>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
            	<img src="{{cloud($teacher->image_path)}}" class="lead-profile-image rounded-circle mb-2 d-block">

            </div>
            <div class="col-lg-6 text-right pt-5 pb-4 px-4" id="scroll-mark">
                <h3 class="">Hello, my name is <strong>{{$teacher->name}}</strong>!</h3>
                <p class="lead">My classes at AnandamayiYoga are related to
                	{{listToSentence($teacher->categories()->pluck('name'))}}
                     Have questions? <a href="{{route('support.contact.show')}}" class="link-default">We're here</a>.
                </p>
            </div>
        </div>
    </div>
</div>