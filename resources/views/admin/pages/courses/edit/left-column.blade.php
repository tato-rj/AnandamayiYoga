<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $course->image_path,
    'path' => "/admin/courses/{$course->slug}/image"])
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $course->video_path,
    'path' => "/admin/courses/{$course->slug}/video"])

  {{-- COST --}}          
  <div class="form-group edit-control" id="cost-{{$course->id}}" name="cost">

    @include('components.form.edit.label', [
      'title' => 'This course costs',
      'id' => "cost-{$course->id}",
      'path' => "/admin/courses/{$course->id}"
    ])

    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">$</span>
      </div>
      <input type="text" disabled class="form-control" value="{{$course->cost}}" name="cost">
    </div>
  </div>

  {{-- LANGUAGE --}}
  <div class="form-group edit-control" id="language-{{$course->id}}" name="language">
    @include('components.form.edit.label', [
      'title' => 'Language',
      'id' => "language-{$course->id}",
      'path' => "/admin/courses/{$course->id}"
    ])

    <select name="language" disabled class="form-control">
      <option value="en" @match($course->language, 'en') selected @endmatch>English</option>
      <option value="pt" @match($course->language, 'pt') selected @endmatch>Português</option>
    </select>
  </div>
</div>
