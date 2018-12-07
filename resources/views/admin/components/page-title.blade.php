<header class="border-bottom mb-4">
    <h2>{{$title}}</h2>
    @if(is_array($subtitle))
    <div class="d-flex align-items-center justify-content-between mb-2">
    	@if(! empty($subtitle['url']))
	    <div><a href="{{$subtitle['url']}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>{{$subtitle['label']}}</a></div>
	    @else
	    <div>{{$subtitle['label']}}</div>
	    @endif
	    @if(! empty($subtitle['publishable']))
	    <div>
	    	<form method="POST" action="{{$subtitle['publishable']['url']}}">
	    		@csrf
	    		@method('PATCH')
	    		@if($subtitle['publishable']['model']->published)
	    		<button type="submit" class="btn-bold btn-secondary btn-xs"><i class="fas fa-times-circle mr-2"></i>Unpublish</button>
	    		@else
	    		<button type="submit" class="btn-bold btn-warning btn-xs"><i class="fas fa-cloud-upload-alt mr-2"></i>Publish</button>
	    		@endif
	    	</form>
	    </div>
	    @endif
	</div>
    @else
    <div class="mb-2">{{$subtitle}}</div>
    @endif
</header>