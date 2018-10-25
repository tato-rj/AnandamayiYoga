<div class="form-group edit-control">
  <form method="POST" class="border rounded" action="{{$path}}" enctype="multipart/form-data" id="upload-box" class="rounded border">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <input type="file" id="image-input" name="image" style="display:none;" />
    <img class="card-img-top" id="image" src="{{cloud($image)}}" alt="Not an image">
    <div class="card-body text-center">
      <button type="button" id="upload-button" class="btn btn-block btn-outline-red mb-2">
        <i class="fas fa-image mr-2"></i>Select image
      </button>
      <button disabled type="submit" id="submit-file" class="btn btn-blue btn-block block-screen-button">
        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
      </button>
    </div>
  </form>

  @include('admin/components/uploads/image-feedback')

</div>