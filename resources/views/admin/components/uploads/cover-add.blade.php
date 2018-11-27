<div class="form-group">
  <div id="upload-box">
    <input required type="file" id="cover-input" data-target="#cover" name="cover" style="display:none;" />
    <img class="w-100" id="cover" src="{{cloud('app/misc/no-image.png')}}">
    <div class="card-body p-2 text-center">
      <button type="button" id="upload-cover-button" class="btn-link text-blue cursor-pointer border-0">
        <i class="fas fa-folder-open fa-lg"></i>
        <div class="text-muted"><small>Select</small></div>
      </button>
    </div>
  </div>
    
  @if ($errors->has('cover'))
  <div class="invalid-feedback">
    {{ $errors->first('cover') }}
  </div>
  @endif
</div>