<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Class Name">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A lesson with this name already exists</small></p>
    @if ($errors->has('name'))
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
    @endif
  </div>
  {{-- DESCRIPTION --}}
  <div class="form-group">
    <textarea required name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" rows="3">{{ old('description') }}</textarea>
    @if ($errors->has('description'))
    <div class="invalid-feedback">
      {{ $errors->first('description') }}
    </div>
    @endif
  </div>

  {{-- CATEGORIES --}}
  <div class="form-group">
      <label class="d-block text-muted"><small>This lesson is good for</small></label>
      <div class="row mx-2">
        @foreach($categories as $category)
        <div class="form-check custom-control custom-checkbox col-lg-6 col-md-6 col-sm-12 col-12">
          <input required class="custom-control-input" 
            name="category[]" 
            type="checkbox" 
            id="category-{{$category->id}}" 
            value="{{$category->id}}">
          <label class="mb-2 custom-control-label" for="category-{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
    @if ($errors->has('category'))
    <div class="invalid-feedback">
      {{ $errors->first('category') }}
    </div>
    @endif
  </div>

  {{-- LEVELS --}}
  <div class="form-group">
      <label class="d-block text-muted"><small>The Yoga level is</small></label>
      @foreach($levels as $level)
      <div class="form-check custom-control custom-checkbox d-inline mx-2">
        <input required class="custom-control-input" 
          name="levels[]" 
          type="checkbox" 
          id="level-{{$level->id}}" 
          value="{{$level->id}}">
        <label class="mb-2 custom-control-label" for="level-{{$level->id}}">{{$level->name}}</label>
      </div>
      @endforeach
    @if ($errors->has('levels'))
    <div class="invalid-feedback">
      {{ $errors->first('levels') }}
    </div>
    @endif
  </div>

  {{-- COST --}}
  <div class="form-group {{ $errors->has('is_free') ? 'is-invalid' : '' }}">
    <label class="d-block text-muted"><small>Is this lesson free?</small></label>
    <div class="custom-control custom-radio custom-control-inline">
      <input required type="radio" id="is_free-yes" name="is_free" value="1" class="custom-control-input" @old('is_free', '1') checked @endold>
      <label class="custom-control-label" for="is_free-yes">Yes</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input required type="radio" id="is_free-no" name="is_free" value="0" class="custom-control-input" @old('is_free', '0') selected @endold>
      <label class="custom-control-label" for="is_free-no">No</label>
    </div>
    @if ($errors->has('is_free'))
    <div class="invalid-feedback">
      {{ $errors->first('is_free') }}
    </div>
    @endif
  </div>

</div>