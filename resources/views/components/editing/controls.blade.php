<div>
	{{-- EDIT BUTTON --}}
	<span class="badge shadow-dark badge-light edit cursor-pointer"
	  {{$attr or null}}
	  data-id="{{$id}}"
	  style="line-height: 1.2;">
	edit</span>
	{{-- <i class="fas fa-edit cursor-pointer text-warning edit" {{$attr or null}} data-id="{{$id}}"></i> --}}
	{{-- SAVE BUTTON --}}
	<span class="badge badge-success shadow-dark save cursor-pointer"
	  data-id="{{$id}}" 
	  data-path="{{$path}}"
	  style="display: none; line-height: 1.2;">
	save</span>
	{{-- LOADING BUTTON --}}
	<span class="badge badge-success border-0 loading" style="display: none; line-height: 1.2; opacity: 0.5">saving</span>
</div>