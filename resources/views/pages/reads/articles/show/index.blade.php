@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/articles/show/lead')
    
    <div id="scroll-mark" class="row">
    	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto d-flex justify-content-between py-3 border-bottom">
			<p class="m-0">
				<strong class="mr-1 d-none d-xl-inline-block">Share this article on</strong>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-facebook-f"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fab fa-lg fa-twitter"></i></a>
				<a class="link-none" href="#"><i class="t-2 ml-3 fas fa-lg fa-envelope"></i></a>
			</p>
    		<p class="text-muted m-0"><small>last updated on {{$article->updated_at->toFormattedDateString()}}</small></p>
    	</div>

    	<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
    		<div class="row my-4">
    			<div class="col-lg-9 col-md-9 col-sm-9 col-12">
		    		<h2>{{$article->title}}</h2>
		    		<div class="d-flex justify-content-between align-items-center">
			    		<p class="text-muted"><small>by {{$article->author->name}} on {{$article->created_at->toFormattedDateString()}}</small></p>
			    		<p class="text-muted"><small><i class="fas fa-eye mr-2"></i>{{$article->views_count}}</small></p>
			    	</div>
			    	<div>
			    		<img src="{{cloud($article->image_path)}}" class="w-100">
			    		<div class="d-flex flex-wrap mt-3">
			    			<p class="mb-0 mr-2 text-muted"><small>Main topics</small></p>
				    		@foreach($article->topics as $topic)
				    			<span class="badge badge-light m-1">
				    				<a href="{{route('reads.articles.index')}}?topic={{$topic->slug}}" class="link-none">{{$topic->name}}</a>
				    			</span>
				    		@endforeach
			    		</div>
			    	</div>
		    		<div class="mt-4 trix-content">
			    		{!! $article->content !!}
			    	</div>
    			</div>

    			@include('pages/reads/articles/sidebar')

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