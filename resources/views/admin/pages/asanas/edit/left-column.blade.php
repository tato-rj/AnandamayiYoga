<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $asana->image_path,
    'path' => "/admin/asanas/{$asana->slug}/image"
    ])

  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $asana->video_path,
    'path' => "/admin/asanas/{$asana->slug}/video"])
</div>
