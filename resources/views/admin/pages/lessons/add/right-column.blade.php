<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    @input(['lang' => 'en', 'name' => 'name', 'label' => 'Class name', 'value' => old('name')])
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A lesson with this name already exists</small></p>
    @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome da aula', 'value' => old('name_pt')])
  </div>
  {{-- DESCRIPTION --}}
  <div class="form-group">
    @textarea(['lang' => 'en', 'name' => 'description', 'label' => 'Description', 'value' => old('description')])
    @textarea(['lang' => 'pt', 'name' => 'description_pt', 'label' => 'Descrição', 'value' => old('description_pt')])
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