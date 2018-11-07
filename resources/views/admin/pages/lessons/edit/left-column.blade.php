<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $lesson->image_path,
    'path' => "/admin/classes/{$lesson->slug}/image"])
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $lesson->video_path,
    'path' => "/admin/classes/{$lesson->slug}/video"])

    @if($lesson->duration)
    <p class="mx-1"><small><i class="fas fa-clock mr-2 text-red"></i>This lesson is about <strong>{{secondsToTime($lesson->duration)}}</strong> hr long</small></p>
    @else
    <p class="mx-1 text-muted"><small><i class="fas fa-clock mr-2"></i>Duration not set</small></p>
    @endif
</div>