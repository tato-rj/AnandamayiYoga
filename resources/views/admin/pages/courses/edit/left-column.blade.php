<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $course->image_path,
    'path' => "/office/courses/{$course->slug}/image"])
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $course->video_path,
    'path' => "/office/courses/{$course->slug}/video"])

  {{-- COST --}}          
  <div class="form-group edit-control" id="cost-{{$course->id}}" name="cost">

    @component('components/editing/label', [
      'title' => 'This course costs',
      'id' => "cost-{$course->id}",
      'path' => "/office/courses/{$course->id}"
    ])
    @endcomponent

    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">$</span>
      </div>
      <input type="text" disabled class="form-control" value="{{$course->cost}}" name="cost">
    </div>
  </div>

</div>
