  <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
    <div class="border rounded t-2 hover-shadow-light">
      <a href="/admin/teachers/{{$teacher->slug}}" class="link-none">
        <div class="m-3 bg-full rounded" style="background-image:url({{cloud($teacher->image_path)}}); height: 160px;"></div>
        <div class="m-3">
          <p class="m-0 clamp-1 border-bottom mb-1 pb-1"><strong>{{$teacher->name}}</strong></p>
          <p class="m-0 l-height-1 text-muted"><small>Member since<br>{{$teacher->created_at->toFormattedDateString()}}</small></p>
        </div>
      </a>
    </div>
  </div>