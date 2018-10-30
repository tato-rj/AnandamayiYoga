<div class="row">
	<section class="col-12 bg-full d-flex align-items-end" style="background-image:url({{cloud('app/covers/library.jpg')}}); height: 60vh;">
		<div class="overlay w-100 h-100 bg-dark z-0"></div>
		<div class="container-fluid">
			<div class="row text-white z-10 w-100">
				<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
					<a href="{{route('reads.learning.index', $subject)}}" class="link-none">
						<h1 class="mb-3"><strong>{{slug_str($subject)}}</strong></h1>
					</a>
					
				</div>
			</div>
		</div>
	</section>
</div>