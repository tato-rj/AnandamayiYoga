<label class="switch mb-0 mr-2">
	<input type="checkbox" 
	@if($isChecked)
	checked
	@endif
	 data-route="/subscriptions/{{$list}}">
	<span class="slider round"></span>
</label>