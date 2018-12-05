@manager
<div class="form-group">
  <div class="embed-responsive embed-responsive-16by9 mb-2 border rounded">
    <video id="video-preview" controls>
      <source src="{{cloud($video)}}" type="video/mp4">
    </video>
  </div>
  <form method="POST" action="{{$path}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="hidden" name="duration">
    <div class="custom-file">
      <input type="file" class="custom-file-input video" name="video" id="video">
      <label class="custom-file-label clamp-1" for="video">Choose video</label>
    </div>
    <div id="video-upload-button" style="display: none;">

      @component('components/buttons/spinner', [
        'classes' => 'btn btn-blue btn-block mt-2 block-screen-button',
        ])
        @slot('label')
        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
        @endslot
      @endcomponent
      
    </div>
  </form>
  @if ($errors->has('video'))
  <div class="invalid-feedback">
    {{ $errors->first('video') }}
  </div>
  @endif
</div>
@endmanager
