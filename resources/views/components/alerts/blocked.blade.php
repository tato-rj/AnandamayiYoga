<div id="blocked" class="row mt-5 mb-6" style="{{$show ? null : 'display: none;'}}">
	<div class="col-lg-8 col-md-8 col-sm-10 col-12 mx-auto bg-light shadow px-4 py-5 rounded border-thin">
		<h4 class="text-center">{{$title}}</h4>
		<p class="lead m-4">{{$description}}</p>
		<div class="text-center">
			<a href="{{route('register')}}" class="btn btn-red mx-auto my-3"><strong>@lang('Start your free trial')</strong></a>
			<p class="text-muted m-0"><small>@lang('Already a member?') <a href="" data-toggle="modal" data-target="#login" class="link-default">@lang('Click here')</a></small></p>
		</div>
	</div>
</div>