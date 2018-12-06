<div class="form-group">
  <div id="upload-box">
    <input required type="file" data-target="#image" id="image-input" name="image" style="display:none;" />
    <div class="position-relative image-container">
      @include('admin.components.uploads.label', ['text' => 'MAIN IMAGE', 'icon' => 'image'])
      <img class="w-100 border" id="image" src="{{cloud('app/misc/no-image.png')}}">
      <div class="controls text-center">
        <button type="button" id="upload-button" class="btn-link text-blue cursor-pointer border-0">
          <i class="fas fa-folder-open fa-lg"></i>
          <div class="text-muted"><small>Select</small></div>
        </button>
      </div>
    </div>
  </div>
    
  @if ($errors->has('image'))
  <div class="invalid-feedback">
    {{ $errors->first('image') }}
  </div>
  @endif
</div>