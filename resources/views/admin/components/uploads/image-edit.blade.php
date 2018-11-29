<div class="form-group edit-control">
  <form method="POST" action="{{$path}}" enctype="multipart/form-data" id="upload-box">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <input type="file" id="image-input" name="image" data-target="#image" style="display:none;" />
    <div class="position-relative image-container">
      <img class="w-100" id="image" src="{{cloud($image)}}" alt="Not an image">
      <div class="controls text-center">
        <div class="d-flex justify-content-center align-items-center">
          <button type="button" id="upload-button" class="btn-link text-blue cursor-pointer border-0 px-4">
            <i class="fas fa-folder-open"></i>
            <div class="text-muted"><small>Select</small></div>
          </button>
          <button type="submit" id="submit-file" disabled class="btn-link text-blue cursor-pointer border-0 px-4 block-screen-button">
            <i class="fas fa-cloud-upload-alt"></i>
            <div class="text-muted"><small>Upload</small></div>
          </button>
        </div>
      </div>
    </div>
  </form>

</div>