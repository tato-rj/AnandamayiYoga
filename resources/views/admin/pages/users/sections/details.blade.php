@if($favorites->count() > 0)
<small class="text-blue cursor-pointer mb-1 d-block" data-toggle="collapse" href="#details-fav-{{$icon}}">details<i class="ml-2 fas fa-caret-down"></i></small>
<div class="collapse multi-collapse" id="details-fav-{{$icon}}">
  <div class="text-left bg-light rounded px-3 py-2">
    
    @foreach($favorites as $favorite)
    
    <div class="d-flex justify-content-between" style="
        max-height: 120px;
    	overflow-y: auto;">
    	<a href="{{$favorite->path()}}" target="_blank" class="link-blue d-block clamp-1"><small><i class="fas fa-{{$icon}} mr-2"></i>{{$favorite->name}}</small></a>
    	<span class="text-muted"><small>{{$favorite->pivot->created_at->format('d/m/y')}}</small></span>
    </div>
    
    @endforeach
  </div>
</div>
@endif