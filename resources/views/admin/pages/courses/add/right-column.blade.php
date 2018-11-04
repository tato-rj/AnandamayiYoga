<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    @input(['required' => true, 'lang' => null, 'name' => 'name', 'label' => 'Course name', 'value' => old('name')])
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A course with this name already exists</small></p>
  </div>
  {{-- HEADLINE --}}
  <div class="form-group">
    @textarea(['required' => true, 'lang' => null, 'name' => 'headline', 'label' => 'Short description', 'value' => old('headline')])
  </div>

  {{-- DESCRIPTION --}}
  <div class="form-group">
    @trix(['required' => true, 'lang' => null, 'name' => 'description', 'label' => 'Complete description', 'value' => old('description')])
  </div>

  {{-- TEACHERS --}}
  <div class="form-group">
      <label class="d-block text-muted"><small>Select one or more teachers below</small></label>
      <select multiple name="teachers[]" required class="form-control {{ $errors->has('teachers[]') ? 'is-invalid' : '' }}">
         @foreach($teachers as $teacher)
         <option value="{{$teacher->id}}" 
          @oldArray('teachers', $teacher->id) selected @endoldArray>{{$teacher->name}}</option>
          @endforeach
      </select>
    @if ($errors->has('teachers[]'))
    <div class="invalid-feedback">
      {{ $errors->first('teachers[]') }}
    </div>
    @endif
  </div>

</div>