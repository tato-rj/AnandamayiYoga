<div class="{{$lang ?? null}}-field" style="display: {{! empty($lang) && $lang == 'pt' ? 'none' : null}}">
<input type="hidden" id="trix-{{$name}}" name="{{$name}}" value="{{$value}}">
<trix-editor 
	class="{{$classes ?? null}}  {{ $errors->has($name) ? 'is-invalid' : '' }}" 
	input="trix-{{$name}}" 
	placeholder="{{$label}}" 
	style="height: {{$height ?? '280px'}}"
	{{$required ?? 'required'}}></trix-editor>
@if ($errors->has($name))
<div class="invalid-feedback">
  {{ $errors->first($name) }}
</div>
@endif
</div>