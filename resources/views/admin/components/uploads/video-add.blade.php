<div class="form-group">
  <div class="custom-file">
    <input {{$video_required or 'required'}} type="file" class="custom-file-input video" name="video" id="video">
    <label class="custom-file-label clamp-1" for="video">Choose video</label>
  </div>
  <div class="file-info" style="display: none;">
      <div class="alert alert-success px-3 py-1 mt-2">
        <p class="m-0"><small><i class="fas fa-check mr-2"></i>Size: <strong><span class="size"></span></strong></small></p>
      </div>
  </div>
  @if ($errors->has('video'))
  <div class="invalid-feedback">
    {{ $errors->first('video') }}
  </div>
  @endif
</div>
<video class="d-none video-object" id="video-object"></video>
<input type="hidden" name="duration">