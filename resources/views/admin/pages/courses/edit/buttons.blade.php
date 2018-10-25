<hr class="my-4">
<div class="form-group d-flex justify-content-between">
  <button data-path="{{route('admin.courses.destroy', $course->slug)}}" data-toggle="modal" data-target="#delete-confirm" class="btn btn-danger d-inline-flex justify-content-center align-items-center">
    Delete course</i>
  </button>
  <div class="d-flex align-items-center">
    <form method="POST" action="{{route('admin.courses.status', $course->id)}}">
      {{csrf_field()}}
      {{method_field('PATCH')}}
      @if($course->published)
      <input type="hidden" name="is_published" value="1">
      <button class="btn btn-success ml-2">Unpublish</button>
      @else
      <input type="hidden" name="is_published" value="0">
      <button class="btn btn-warning ml-2">Publish</button>
      @endif
    </form>
    <a href="{{route('admin.courses.chapters.manage', $course->slug)}}" class="btn btn-blue d-inline-flex justify-content-center align-items-center ml-2">
      Edit the chapters<i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>
</div>