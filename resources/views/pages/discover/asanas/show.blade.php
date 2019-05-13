{{-- @if($asanas->count() > 0)
<p class="m-0 text-muted"><small>@lang('Total of') <span id="asanas-count">{{$asanas->total()}}</span> asanas</small></p>
@endif --}}
<div id="asanas-container" class="d-flex align-items-center mt-2 flex-wrap w-100">
	@if($asanas->count() >= 60)
	    @forelse($asanas as $asana)

	        @include('components/asana/card')

	    @empty
	    
	        @include('components/filters/empty')

	    @endforelse
    @else
		<div class="text-center w-100 mt-7 mb-4">
		    <img src="{{cloud('app/brand/logo-gray.svg')}}" 
		    	class="mb-5" 
				style="width: 240px; opacity: 0.2;">
		    <h3
		    	style="color: lightgrey">@lang('Coming out soon...')</h3>
		</div>
    @endif
{{--     <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $asanas->links() }}    
    </div> --}}
</div>