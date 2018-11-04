<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-edit', [
    'image' => $program->image_path,
    'path' => "/admin/programs/{$program->slug}/image"])

  {{-- VIDEO --}}
  @include('admin/components/uploads/video-edit', [
    'video' => $program->video_path,
    'path' => "/admin/programs/{$program->slug}/video"])

{{-- TEACHER --}}
<div class="form-group edit-control" name="teacher_id" id="teacher_id-{{$program->id}}">
  
  @include('components.form.edit.label', [
    'title' => 'This program is taught by',
    'id' => "teacher_id-{$program->id}",
    'path' => "/admin/programs/{$program->id}"
  ])

  <select disabled class="form-control">
    <option selected value="">No teacher</option>
    @foreach($teachers as $teacher)
      <option value="{{$teacher->id}}" @match($program->teacher_id, $teacher->id) selected @endmatch>{{$teacher->name}}</option>
    @endforeach
  </select>

</div>

</div>