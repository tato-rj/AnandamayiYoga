<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
	<div class="p-2">
		<div class="mb-4 shadow-dark" style="height: 160px">
			<div class="bg-full w-100 h-100 position-relative rounded" style="background-image:url({{cloud('app/images/articles/'.str_slug($topic).'/lead.jpg')}});">
				<div class="position-absolute" style="bottom: 0; left: 14px; z-index: 1">
					<h3 class="text-white"><strong>{{$topic}}</strong></h3>
				</div>
				<div class="overlay w-100 h-100 bg-blue z-0 rounded-top"></div>
			</div>	
		</div>
		{{$slot}}		
	</div>
</div>
