{{-- NAME --}}
<div class="form-group">
  <input required type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name">
  @if ($errors->has('name'))
  <div class="invalid-feedback">
    {{ $errors->first('name') }}
  </div>
  @endif
</div>

{{-- EMAIL --}}
<div class="form-group">
  <input required type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail">
  @if ($errors->has('email'))
  <div class="invalid-feedback">
    {{ $errors->first('email') }}
  </div>
  @endif
</div>

{{-- WEBSITE --}}
<div class="form-group">
  <input type="text" class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" name="website" value="{{ old('website') }}" placeholder="Website (optional)">
  @if ($errors->has('website'))
  <div class="invalid-feedback">
    {{ $errors->first('website') }}
  </div>
  @endif
</div>

{{-- BIOGRAPHY --}}
<div class="form-group">
  @trix(['lang' => 'en', 'name' => 'biography', 'label' => 'Biography', 'value' => old('biography')])
  @trix(['lang' => 'pt', 'name' => 'biography_pt', 'label' => 'Biografia', 'value' => old('biography_pt')])
</div>

{{-- CATEGORIES --}}
<div class="form-group">
    <label class="d-block text-muted"><small>This teacher focuses on</small></label>
    <div class="mx-2" style="column-count: 3">
      @foreach($categories as $category)
      <div class="form-check custom-control custom-checkbox">
        <input required class="custom-control-input" 
          name="category[]" 
          type="checkbox" 
          id="category-{{$category->id}}" 
          value="{{$category->id}}">
        <label class="mb-2 custom-control-label text-muted" for="category-{{$category->id}}">{{$category->name}}</label>
      </div>
      @endforeach
    </div>
  @if ($errors->has('category'))
  <div class="invalid-feedback">
    {{ $errors->first('category') }}
  </div>
  @endif
</div>
