<div class="row my-5 pb-5">
	<div class="col-lg-5 col-md-5 col-sm-10 col-10 mx-auto mb-4">
		<figure class="figure px-4">
			<img src="{{cloud($book->image_path)}}" class="figure-img img-fluid mb-4 shadow">
		<a href="{{$book->amazon_url}}" target="_blank" class="btn btn-blue btn-block"><i class="fab fa-amazon mr-2"></i>@lang('Buy on') <strong>amazon.com</strong></a>
		</figure>
	</div>
	<div class="col-lg-7 col-md-7 col-sm-12 col-12">
		<div class="border-bottom pb-3 mb-3">
			<h4 class="mb-1"><strong>{{$book->title}}</strong></h4>
			<h5 class="text-muted m-0 clamp-1">{{$book->subtitle}}</h5>
		</div>
		<p class="text-muted mb-2"><small>@lang('About this book')</small></p>
		<small>{!! $book->description !!}</small>
	</div>
</div>