<div class="col-8">
  {{-- NAME --}}
  <div class="form-group">
    @input(['lang' => 'en', 'name' => 'name', 'label' => 'Program name', 'value' => old('name')])
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>A program with this name already exists</small></p>
    @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome do programa', 'value' => old('name_pt')])
  </div>
  {{-- DESCRIPTION --}}
  <div class="form-group">
    @textarea(['lang' => 'en', 'name' => 'description', 'label' => 'Description', 'value' => old('description')])
    @textarea(['lang' => 'pt', 'name' => 'description_pt', 'label' => 'Descrição', 'value' => old('description_pt')])
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