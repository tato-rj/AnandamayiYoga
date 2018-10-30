@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('pages/reads/learning/show/lead')
    
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

</div>

@endsection
