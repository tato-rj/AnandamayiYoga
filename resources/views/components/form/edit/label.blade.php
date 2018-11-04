<div class="d-flex justify-content-between align-items-center">
  
  <label class="d-block text-muted"><small>{{$title}}</small></label>
  
	<div>
		{{-- EDIT BUTTON --}}
		<span class="badge shadow-dark badge-light edit cursor-pointer"
		  {{$attr ?? null}}
		  data-id="{{$id ?? null}}"
		  style="line-height: 1.2;">
		edit</span>
		{{-- SAVE BUTTON --}}
		<span class="badge badge-success shadow-dark save cursor-pointer"
		  data-id="{{$id ?? null}}" 
		  data-path="{{$path ?? null}}"
		  style="display: none; line-height: 1.2;">
		save</span>
		{{-- LOADING BUTTON --}}
		<span class="badge badge-success border-0 loading" style="display: none; line-height: 1.2; opacity: 0.5">saving</span>
	</div>

</div>