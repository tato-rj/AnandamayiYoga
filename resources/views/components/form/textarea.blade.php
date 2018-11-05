<textarea 
	class="form-control {{$classes ?? null}} {{$lang ?? null}}-field {{ $errors->has($name) ? 'is-invalid' : '' }}" 
	{{$required ?? 'required'}}  
	name="{{$name}}" 
	style="display: {{! empty($lang) && $lang == 'pt' ? 'none' : null}}"
	rows="{{$rows ?? 4}}" 
	maxlength="{{$limit ?? null}}" 
	placeholder="{{$label}}">{{$value}}</textarea>

@if ($errors->has($name))
<div class="invalid-feedback">
  {{ $errors->first($name) }}
</div>
@endif