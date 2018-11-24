<div class="col-12 mb-4">
    <div class="d-flex flex-row flex-wrap justify-content-center">
    	@foreach($topics as $topic)
        	<a href="{{route('reads.articles.index', ['topic' => $topic->slug])}}" 
        		class="btn-not-bold mobile-block m-2 btn-lg rounded-0 {{$currentTopic->slug == $topic->slug ? 'btn-red' : 'btn-outline-red'}}">{{$topic->name}}
        	</a>
    	@endforeach
    </div>
</div>