<div class="form-group">
  <div id="upload-box">
    <input required type="file" id="cover-input" data-target="#cover" name="cover" style="display:none;" />
    <div class="position-relative image-container">
    @include('admin.components.uploads.label', ['text' => 'COVER IMAGE', 'icon' => 'image'])
    <img class="w-100 border" id="cover" src="{{cloud('app/misc/no-image.png')}}">
      <div class="controls text-center">
        <button type="button" id="upload-cover-button" class="btn-link text-blue cursor-pointer border-0">
          <i class="fas fa-folder-open fa-lg"></i>
          <div class="text-muted"><small>Select</small></div>
        </button>
      </div>
    </div>
  </div>
    
  @if ($errors->has('cover'))
  <div class="invalid-feedback">
    {{ $errors->first('cover') }}
  </div>
  @endif
</div>