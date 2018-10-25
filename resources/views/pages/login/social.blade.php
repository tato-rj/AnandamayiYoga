<div class="d-flex align-items-center flex-wrap">
	<a href="{{route('login.social', ['provider' => 'facebook'])}}" class="btn btn-block m-1 btn-facebook"><i class="t-2 mr-2 fab fa-facebook-f"></i>Continue with Facebook</a>
	<a href="{{route('login.social', ['provider' => 'google'])}}" class="btn btn-block m-1 btn-google"><i class="t-2 mr-2 fab fa-google-plus-g"></i>Continue with Google</a>
	{{-- <a href="/login/instagram" class="btn btn-block m-1 btn-instagram"><i class="t-2 mr-2 fab fa-instagram"></i>Log in with Instagram</a> --}}
	<a href="{{route('login.social', ['provider' => 'twitter'])}}" class="btn btn-block m-1 btn-twitter"><i class="t-2 mr-2 fab fa-twitter"></i>Continue with Twitter</a>
</div>