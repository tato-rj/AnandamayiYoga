@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/show/lead')
    
    <div id="scroll-mark" class="row">
    	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto d-flex justify-content-between py-3 border-bottom">
			<p class="m-0">
				<strong class="mr-1 d-none d-xl-inline-block">@lang('Share this article on')</strong>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-facebook-f"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-twitter"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fas fa-lg fa-envelope"></i></a>
			</p>
    		<p class="text-muted m-0"><small>@lang('last updated on') {{$article->updated_at->toFormattedDateString()}}</small></p>
    	</div>

    	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
    		<div class="my-4">
    			<div class="my-5">
		    		<h2 class="text-center">{{$article->title}}</h2>
		    		<p class="text-muted text-center"><small>by {{$article->author->name}}</small></p>
		    	</div>
	    		<div class="mt-4 trix-content">
		    		{!! $article->content !!}
		    	</div>
    		</div>
    	</div>
    </div>
    @include('components/disqus/show')
</div>

@endsection

@section('scripts')
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anandamayiyoga.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
@endsection