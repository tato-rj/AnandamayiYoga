<button 
	type="{{$type ?? null}}" 
	onclick="{{$onclick ?? null}}" 
	class="btn-bold {{$classes}} d-inline-flex justify-content-center align-items-center" {{$attr ?? null}} >

	<span class="label">@lang($label)</span>

</button>  	