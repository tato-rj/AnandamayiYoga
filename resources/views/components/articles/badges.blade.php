@foreach($article->topics as $topic)
<div class="badge badge-pill badge-light">
	<a href="{{route('reads.articles.index', $topic->slug)}}" class="link-none">
		{{$topic->name}}
	</a>
</div>
@endforeach