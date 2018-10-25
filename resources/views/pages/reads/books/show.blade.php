<div class="row my-5 pb-5">
	<div class="col-lg-5 col-md-5 col-sm-10 col-10 mx-auto mb-4">
		<figure class="figure px-4">
			<img src="{{cloud('app/images/books/'.$book.'/front.jpg')}}" class="figure-img img-fluid">
			<div class="row p-2 d-none d-sm-flex">
				<div class="col-lg-3 col-md-3 col-sm-3 col-2 p-2">
					<img src="{{cloud('app/images/books/'.$book.'/front.jpg')}}" class="thumbnail w-100 cursor-pointer" data-toggle="modal" data-target="#preview-slides">	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-2 p-2">
					<img src="{{cloud('app/images/books/'.$book.'/back.jpg')}}" class="thumbnail w-100 cursor-pointer" data-toggle="modal" data-target="#preview-slides">	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-2 p-2">
					<img src="{{cloud('app/images/books/'.$page.'.jpg')}}" class="thumbnail w-100 cursor-pointer" data-toggle="modal" data-target="#preview-slides">	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-2 p-2">
					<img src="{{cloud('app/images/books/'.$page.'.jpg')}}" class="thumbnail w-100 cursor-pointer" data-toggle="modal" data-target="#preview-slides">	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-2 p-2">
					<img src="{{cloud('app/images/books/'.$page.'.jpg')}}" class="thumbnail w-100 cursor-pointer" data-toggle="modal" data-target="#preview-slides">
				</div>
			</div>
		</figure>
	</div>
	<div class="col-lg-7 col-md-7 col-sm-12 col-12">
		{{$paragraph_1}}
		{{$paragraph_2}}
		{{$paragraph_3}}
		<a href="#" target="_blank" class="btn btn-blue mt-4"><i class="fab fa-amazon mr-2"></i>Buy on <strong>amazon.com</strong></a>
        <a href="#" target="_blank" class="btn btn-outline-yellow mt-4"><i class="fas fa-cloud-download-alt mr-2"></i>Preview</a>
	</div>
</div>