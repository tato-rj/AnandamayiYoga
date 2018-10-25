<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $lesson->image_path,
    'path' => "/office/classes/{$lesson->slug}/image"])
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $lesson->video_path,
    'path' => "/office/classes/{$lesson->slug}/video"])

</div>