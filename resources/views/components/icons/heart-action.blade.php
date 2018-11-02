<button class="favorite-icon p-0">
	<i class="{{$icon}} cursor-pointer text-{{$color ?? 'danger'}} fa-heart animated-fast" 
	data-url-store="{{route('user.favorite.store')}}" 
	data-url-destroy="{{route('user.favorite.destroy')}}"
	data-favorited_id="{{$favorited_id}}" 
	data-favorited_type="{{$favorited_type}}" 
	title="Add to favorites"></i>
</button>
<span class="favorite-label ml-1">
{{$label ?? null}}
</span>