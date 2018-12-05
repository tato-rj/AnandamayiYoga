@manager
<div class="form-group">
  <div class="embed-responsive embed-responsive-16by9 mb-2 border rounded">
    <video id="video-preview" preload="none" controls>
      <source type="video/mp4">
    </video>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input video" name="video" id="video">
    <label class="custom-file-label clamp-1" for="video">Choose video</label>
  </div>
  @if ($errors->has('video'))
  <div class="invalid-feedback">
    {{ $errors->first('video') }}
  </div>
  @endif
</div>
<input type="hidden" name="duration">
@endmanager