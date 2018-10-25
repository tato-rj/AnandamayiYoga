<div class="col-8">
  {{-- SANSKRIT --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('sanskrit') ? 'is-invalid' : '' }}" name="sanskrit" value="{{ old('sanskrit') }}" placeholder="Sanskrit">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>An asana with this name already exists</small></p>
    @if ($errors->has('sanskrit'))
    <div class="invalid-feedback">
      {{ $errors->first('sanskrit') }}
    </div>
    @endif
  </div>
  {{-- NAME --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name">
    @if ($errors->has('name'))
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
    @endif
  </div>
  {{-- ALSO KNOWN AS --}}
  <div class="form-group">
    <input type="text" class="form-control {{ $errors->has('also_known_as') ? 'is-invalid' : '' }}" name="also_known_as" value="{{ old('also_known_as') }}" placeholder="Also known as">
    @if ($errors->has('also_known_as'))
    <div class="invalid-feedback">
      {{ $errors->first('also_known_as') }}
    </div>
    @endif
  </div>
  {{-- ETYMOLOGY --}}
  <div class="form-group">
    <input type="text" class="form-control {{ $errors->has('etymology') ? 'is-invalid' : '' }}" name="etymology" value="{{ old('etymology') }}" placeholder="Etymology">
    @if ($errors->has('etymology'))
    <div class="invalid-feedback">
      {{ $errors->first('etymology') }}
    </div>
    @endif
  </div>

  {{-- BENEFITS --}}
  <div class="form-group">
    <label class="d-block text-muted"><small>The benefits are</small></label>

    <div class="form-group type-container original-type" style="display: none;">

      <a class="align-self-stretch btn btn-danger text-white mr-1">
        <i class="fas fa-minus"></i>
      </a>
      
      <textarea rows="1" class="form-control" name="benefits[]"></textarea>

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

      <a class="align-self-stretch btn btn-danger text-white mr-1">
        <i class="fas fa-minus"></i>
      </a>
      
      <textarea rows="1" class="form-control" name="steps[]"></textarea>

    </div>

    <a class="add-new-field text-warning">
      <small><i class="fas fa-plus mr-2"></i>Add a new step</small>
    </a>

    @if ($errors->has('benefits'))
    <div class="invalid-feedback">
      {{ $errors->first('benefits') }}
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