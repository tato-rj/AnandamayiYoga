<div class="form-group">
  <div id="upload-box" class="rounded border">
    <input required type="file" id="cover-input" data-target="#cover" name="cover" style="display:none;" />
    <img class="card-img-top" id="cover" src="{{cloud('app/misc/no-image.png')}}">
    <div class="card-body p-2 text-center">
      <button type="button" id="upload-cover-button" class="btn btn-red btn-xs"><i class="fa fa-cloud-upload-alt mr-1" aria-hidden="true"></i>Add cover</button>
    </div>
  </div>
    
  @if ($errors->has('cover'))
  <div class="invalid-feedback">
    {{ $errors->first('cover') }}
  </div>
  @endif
</div>