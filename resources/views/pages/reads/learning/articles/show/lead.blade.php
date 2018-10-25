<div class="row">
	<section class="col-12 bg-full d-flex align-items-end" style="background-image:url({{cloud("app/images/articles/{$section}/lead.jpg")}}); height: 60vh;">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="container">
			<div class="row text-white z-10 w-100">
				<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
					<a href="{{$category_url or '#'}}" class="link-none">
						<h2 class="mb-3"><strong>{{$category}}</strong></h2>
					</a>
					
				</div>
			</div>
		</div>
	</section>
</div>