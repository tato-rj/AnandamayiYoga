<div 
	class="form-group edit-control {{$lang ?? null}}-field {{$classes ?? null}}" 
	style="display: {{$lang == 'pt' ? 'none' : null}}" 
	id="{{$id ?? null}}" 
	name="{{$name}}">

		@include('components.form.edit.label', ['title' => $label])

		<input type="text" disabled class="form-control" value="{{$value ?? null}}" name="{{$name}}">
</div>