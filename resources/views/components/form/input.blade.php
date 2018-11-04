<input 
	class="form-control {{$classes ?? null}} {{$lang ?? null}}-field {{ $errors->has($name) ? 'is-invalid' : '' }}" 
	{{$required ?? 'required'}} 
	type="{{$type ?? 'text'}}" 
	name="{{$name}}" 
	style="display: {{! empty($lang) && $lang == 'pt' ? 'none' : null}}" 
	placeholder="{{$label}}" 
	value="{{$value}}">

    @if ($errors->has($name))
    <div class="invalid-feedback">
      {{ $errors->first($name) }}
    </div>
    @endif