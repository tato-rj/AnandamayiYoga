<div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
  <div class="border rounded t-2 hover-shadow-light">
    <a href="/office/courses/{{$course->slug}}" class="link-none">
      <div class="m-3 bg-full rounded" style="background-image:url({{cloud($course->image_path)}}); height: 120px;"></div>
      <div class="m-3">
        <p class="mb-2 clamp-1 border-bottom pb-1"><strong>{{$course->name}}</strong></p>
        <p class=""><i class="fas fa-list-ol mr-2"></i>{{$course->chapters()->count()}} {{str_plural('chapter', $course->chapters()->count())}}</p>
        <p class="m-0 l-height-1 text-muted"><small>with {{$course->teachersList()}}</small></p>
      </div>
    </a>
  </div>
</div>