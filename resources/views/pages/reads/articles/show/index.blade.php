@extends('layouts/app')

@section('head')
<script type="text/javascript">
window.article = <?php echo json_encode([
    'id' => $article->unique_token
]); ?>
</script>
@endsection

@section('content')
<div class="container-fluid">

    @include('pages/reads/articles/show/lead')
    
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
    		<div class="mt-4 mb-5">
    			<div class="my-5">
		    		<h2 class="text-center">{{$article->title}}</h2>
		    		<p class="text-muted text-center"><small>{{$article->author->name}}</small></p>
		    	</div>
	    		<div id="limited-content" class="trix-content invisible">
		    		{!! $article->content !!}
		    	</div>
{{-- 		    	@include('components.alerts.blocked', [
		    		'show' => false,
		    		'title' => __('Sorry, you\'ve reached your weekly limit!'),
		    		'description' => __('You can read two articles per week for free. Full access to our content is available through our membership.')]) --}}
    		</div>
    		@if($article->similar()->count() > 0)
    		<div class="mb-5">
    			<h4 class="mb-4"><strong>@lang('More articles like this one')</strong></h4>
			    <div class="d-flex flex-wrap">
			        @foreach($article->similar()->take(6)->get() as $article)
			        	@include('pages.reads.articles.card')
			        @endforeach
			    </div>
			</div>
			@endif
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
<script type="text/javascript">
// resetCounter('article');
enforcePageLimit('article');
</script>
@endsection