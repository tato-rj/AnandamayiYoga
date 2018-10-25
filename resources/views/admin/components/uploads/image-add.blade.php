<div class="form-group">
  <div id="upload-box" class="rounded border">
    <input required type="file" id="image-input" name="image" style="display:none;" />
    <img class="card-img-top" id="image" src="{{cloud('app/misc/no-image.png')}}" alt="Not an image">
    <div class="card-body p-2 text-center">
      <button type="button" id="upload-button" class="btn btn-red btn-xs"><i class="fa fa-cloud-upload-alt mr-1" aria-hidden="true"></i>Add image</button>
      <p class="text-center text-muted m-0"><small>800 kb max</small></p>
    </div>
  </div>

  @include('admin/components/uploads/image-feedback')
    
  @if ($errors->has('image'))
  <div class="invalid-feedback">
    {{ $errors->first('image') }}
  </div>
  @endif
</div>