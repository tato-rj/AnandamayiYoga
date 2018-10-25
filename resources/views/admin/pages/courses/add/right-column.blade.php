<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Course Name">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A course with this name already exists</small></p>
    @if ($errors->has('name'))
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
    @endif
  </div>
  {{-- HEADLINE --}}
  <div class="form-group">
    <textarea required name="headline" class="form-control {{ $errors->has('headline') ? 'is-invalid' : '' }}" placeholder="Short description" rows="3">{{ old('headline') }}</textarea>
    @if ($errors->has('headline'))
    <div class="invalid-feedback">
      {{ $errors->first('headline') }}
    </div>
    @endif
  </div>

  {{-- DESCRIPTION --}}
  <div class="form-group">
    <input type="hidden" id="trix-description" name="description" value="{{old('description')}}">
    <trix-editor class="{{ $errors->has('description') ? 'is-invalid' : '' }}" input="trix-description" placeholder="Long Description" required style="height: 280px"></trix-editor>
    @if ($errors->has('description'))
    <div class="invalid-feedback">
      {{ $errors->first('description') }}
    </div>
    @endif
  </div>

  {{-- TEACHERS --}}
  <div class="form-group">
      <label class="d-block text-muted"><small>Select one or more teachers below</small></label>
      <select multiple name="teachers[]" required class="form-control {{ $errors->has('teachers[]') ? 'is-invalid' : '' }}">
         @foreach($teachers as $teacher)
         <option value="{{$teacher->id}}" 
          @oldArray('teachers', $teacher->id) selected @endoldArray>{{$teacher->fullName}}</option>
          @endforeach
      </select>
    @if ($errors->has('teachers[]'))
    <div class="invalid-feedback">
      {{ $errors->first('teachers[]') }}
    </div>
    @endif
  </div>

</div>