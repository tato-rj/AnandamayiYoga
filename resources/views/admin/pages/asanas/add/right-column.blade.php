<div class="col-8">
  {{-- SANSKRIT --}}
  <div class="form-group">
    @input(['name' => 'sanskrit', 'label' => 'Sanskrit', 'value' => old('sanskrit')])
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>An asana with this name already exists</small></p>
  </div>
  {{-- NAME --}}
  <div class="form-group">
    @input(['lang' => 'en', 'name' => 'name', 'label' => 'Name', 'value' => old('name')])
    @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome', 'value' => old('name_pt')])
  </div>
  {{-- ALSO KNOWN AS --}}
  <div class="form-group">
    @input(['lang' => 'en', 'required' => false, 'name' => 'also_knwon_as', 'label' => 'Also known as', 'value' => old('also_knwon_as')])
    @input(['lang' => 'pt', 'required' => false, 'name' => 'also_knwon_as_pt', 'label' => 'Também conhecido como', 'value' => old('also_knwon_as_pt')])
  </div>
  {{-- ETYMOLOGY --}}
  <div class="form-group">
    @input(['lang' => 'en', 'required' => false, 'name' => 'etymology', 'label' => 'Etymology', 'value' => old('etymology')])
    @input(['lang' => 'pt', 'required' => false, 'name' => 'etymology_pt', 'label' => 'Etimologia', 'value' => old('etymology_pt')])
  </div>

  {{-- BENEFITS --}}
  <div class="form-group">
    <label class="d-block text-muted"><small>The benefits are</small></label>

    <div class="form-group type-container original-type" style="display: none;">

      <a class="align-self-stretch btn btn-danger text-white mr-1 d-flex justify-content-center align-items-center">
        <i class="fas fa-minus"></i>
      </a>

      @include('components.form.edit.input-group', ['type' => 'benefits', 'disabled' => false])

    </div>

    <a class="add-new-field text-warning">
      <small><i class="fas fa-plus mr-2"></i>Add a new benefit</small>
    </a>

    @if ($errors->has('benefits'))
    <div class="invalid-feedback">
      {{ $errors->first('benefits') }}
    </div>
    @endif
  </div>

  {{-- STEPS --}}
  <div class="form-group">
    <label class="d-block text-muted"><small>The steps are</small></label>

    <div class="form-group type-container original-type" style="display: none;">

      <a class="align-self-stretch btn btn-danger text-white mr-1 d-flex justify-content-center align-items-center">
        <i class="fas fa-minus"></i>
      </a>

      @include('components.form.edit.input-group', ['type' => 'steps', 'disabled' => false])

    </div>

    <a class="add-new-field text-warning">
      <small><i class="fas fa-plus mr-2"></i>Add a new step</small>
    </a>

    @if ($errors->has('steps'))
    <div class="invalid-feedback">
      {{ $errors->first('steps') }}
    </div>
    @endif
  </div>

  <div class="row">
  
    {{-- LEVELS --}}
    <div class="form-group col-12">
        <label class="d-block text-muted"><small>For people who are</small></label>
        @foreach($levels as $level)
        <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
          <input required class="custom-control-input" 
            name="levels[]" 
            type="checkbox" 
            id="level-{{$level->id}}" 
            value="{{$level->id}}">
          <label class="mb-2 custom-control-label text-muted" for="level-{{$level->id}}">{{$level->name}}</label>
        </div>
        @endforeach
      @if ($errors->has('levels'))
      <div class="invalid-feedback">
        {{ $errors->first('levels') }}
      </div>
      @endif
    </div>
    
    {{-- TYPES --}}
    <div class="form-group col-8">
        <label class="d-block text-muted"><small>Asana's types</small></label>
        @foreach($asanaTypes as $type)
        <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
          <input required class="custom-control-input" 
            name="types[]" 
            type="checkbox" 
            id="type-{{$type->id}}" 
            value="{{$type->id}}">
          <label class="mb-2 custom-control-label text-muted" for="type-{{$type->id}}">{{$type->name}}</label>
        </div>
        @endforeach
      @if ($errors->has('types'))
      <div class="invalid-feedback">
        {{ $errors->first('types') }}
      </div>
      @endif
    </div>

  {{-- SUBTYPES --}}
    <div class="form-group col-8">
        <label class="d-block text-muted"><small>Asana's subtypes</small></label>
        @foreach($asanaSubtypes as $subtype)
        <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
          <input required class="custom-control-input" 
            name="subtypes[]" 
            type="checkbox" 
            id="subtype-{{$subtype->id}}" 
            value="{{$subtype->id}}">
          <label class="mb-2 custom-control-label text-muted" for="subtype-{{$subtype->id}}">{{$subtype->name}}</label>
        </div>
        @endforeach
      @if ($errors->has('subtypes'))
      <div class="invalid-feedback">
        {{ $errors->first('subtypes') }}
      </div>
      @endif
    </div>
  </div>
</div>