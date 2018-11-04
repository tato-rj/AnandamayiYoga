<div class="w-100 border rounded" style="border-color: #ced4da">
	<div class="position-relative icon-input" data-lang="en">
	<input 
		class="form-control form-control-sm rounded-top"
		type="text"
		{{$disabled ? null : 'data-'}}name="{{$type}}[en][]" 
		value="{{empty($value['en']) ? null : $value['en']}}" 
		style="border-radius: 0; border: none; border-bottom: 1px solid #ced4da" 
		{{$disabled ? 'disabled' : null}}>
	</div>
	<div class="position-relative icon-input" data-lang="pt">
	<input 
		class="form-control form-control-sm rounded-bottomm border-0"
		type="text"
		style="border-radius: 0;" 
		{{$disabled ? null : 'data-'}}name="{{$type}}[pt][]" 
		value="{{empty($value['pt']) ? null : $value['pt']}}" 
		{{$disabled ? 'disabled' : null}}>
	</div>
</div>