<div 
	class="form-group edit-control {{$lang ?? null}}-field" 
	style="display: {{$lang == 'pt' ? 'none' : null}}" 
	id="{{$id ?? null}}" 
	name="{{$name}}">

		@include('components.form.edit.label', ['title' => $label])
		
		<textarea disabled class="form-control" name="{{$name}}" rows="{{$rows ?? 4}}">{{$value ?? null}}</textarea>
</div>