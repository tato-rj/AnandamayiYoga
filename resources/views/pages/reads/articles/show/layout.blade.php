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
			    		<p class="text-muted"><small>by {{$article->author}} on {{$article->created_at->toFormattedDateString()}}</small></p>
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

</div>

@endsection
