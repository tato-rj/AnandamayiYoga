<div class="col-lg-3 col-md-3 col-sm-3 col-12 my-3">
	<div class="mb-5">
		<h4 class="border-bottom pb-2">@lang('Trending topics')</h4>
		<div>
			@foreach($topics as $topic)
			<span class="badge badge-light m-1"><a href="?topic={{$topic->slug}}" class="link-none">{{$topic->name}}</a></span>
			@endforeach
		</div>
	</div>
</div>