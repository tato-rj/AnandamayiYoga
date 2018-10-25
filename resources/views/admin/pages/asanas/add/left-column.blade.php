<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')

  {{-- VIDEO --}}
  @include('admin/components/uploads/video-add', ['video_required' => ''])
</div>