<div class="row my-4 mx-4 mb-5">
	<div class="col-12">
		<a href="{{route('reads.articles.show', $article->slug)}}" class="link-none"><h4><strong>{{$article->title}}</strong></h4></a>
		<div class="d-flex align-items-center justify-content-between">
			<p class="text-muted"><small>by {{$article->author->name}} - {{$article->created_at->toFormattedDateString()}}</small></p>
			<small><i class="fas fa-eye mr-2"></i>{{$article->views_count}}</small>
		</div>	
	</div>
	<div class="col-12">
		<div class="position-relative h-100">
			<img src="{{cloud($article->image_path)}}" class="mr-4 mb-3 mt-2" style="float: left; max-width: 280px">
			<p class="m-0">{{$article->summary}} <a href="{{$article->path}}" class="link-blue">Read more</a></p>			
		</div>
	</div>
</div>