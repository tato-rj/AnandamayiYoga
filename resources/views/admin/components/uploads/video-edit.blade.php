<div class="form-group">
  <div class="embed-responsive embed-responsive-16by9 mb-2 border rounded">
    <video controls>
      <source src="{{cloud($video)}}" type="video/mp4">
    </video>
  </div>
  <form method="POST" action="{{$path}}" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PATCH')}}
    <input type="hidden" name="duration">
    <video class="d-none" id="video-object"></video>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="video" id="video">
      <label class="custom-file-label clamp-1" for="video">Choose video</label>
    </div>
    <div class="file-info" style="display: none;">

      @component('components/buttons/spinner', [
        'classes' => 'btn btn-blue btn-block mt-2 block-screen-button',
        ])
        @slot('label')
        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
        @endslot
      @endcomponent
      
      <div class="alert alert-success px-3 py-1 mt-2">
        <p class="m-0"><small><i class="fas fa-check mr-2"></i>Size: <strong><span class="size"></span></strong></small></p>
      </div>
    </div>
  </form>
  @if ($errors->has('video'))
  <div class="invalid-feedback">
    {{ $errors->first('video') }}
  </div>
  @endif
</div>
