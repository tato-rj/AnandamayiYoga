<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" name="name" placeholder="Program Name">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A program with this name already exists</small></p>
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
      <label class="d-block text-muted"><small>This program is good for</small></label>
      <div class="row mx-2">
        @foreach($categories as $category)
        <div class="form-check custom-control custom-checkbox col-lg-6 col-md-6 col-sm-12 col-12">
          <input class="custom-control-input"
          required 
            name="category[]" 
            type="checkbox" 
            id="{{$category->id}}" 
            value="{{$category->id}}">
          <label class="mb-2 custom-control-label text-muted" for="{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
    @if ($errors->has('category'))
    <div class="invalid-feedback">
      {{ $errors->first('category') }}
    </div>
    @endif
  </div>
</div>