<div 
	class="form-group edit-control {{$lang ?? null}}-field" 
	style="display: {{! empty($lang) && $lang == 'pt' ? 'none' : null}}" 
	id="{{$id ?? null}}" 
	name="{{$name}}">

		@include('components.form.edit.label', ['title' => $label])
		
		<input type="hidden" bind="trix" id="trix-{{$name}}" name="{{$name}}" value="{{$value ?? null}}">
		<trix-editor 
			class="{{$classes ?? null}} trix-disabled" 
			input="trix-{{$name}}"
			style="height: {{$height ?? '280px'}}"></trix-editor>
</div>
