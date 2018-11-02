<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
	<div class="{{$style ?? null}} m-1">
		<div class="bg-blue rounded-top text-white px-4 py-3">
			<h5 class="m-0"><strong>{{$day}}</strong></h5>
		</div>
		<div class="bg-blue-light text-white px-4 pb-1 text-center">
			<p class="m-0 text-light"><small><strong>{{$time ?? null}}</strong></small></p>
		</div>
		<div class="border-left border-right">
			{{$lessons}}
		</div>
	</div>
</div>