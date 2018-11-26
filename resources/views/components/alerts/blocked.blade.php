<div id="blocked" style="display: none;" class="my-5 p-5 bg-light">
	<div class="d-flex align-items-center mb-4">
		<i class="fas fa-lock mr-3 ml-1 text-danger fa-lg"></i>
		<h4 class="m-0">@lang('Sorry, you\'ve reached your weekly limit!')</h4>
	</div>
	<p class="lead mb-2">{{$description}}</p>
   	<p class="lead mb-4 pb-4 border-bottom"><a href="{{route('register')}}" class="link-red">@lang('Register now')</a> @lang('and enjoy unlimited access to our classes, programs and articles!')</p>
	<p class="m-0 lead">@lang('Already a member?') <a href="{{route('login')}}" class="link-red">@lang('Click here')</a></p>
</div>