<div class="col-4">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  
  {{-- VIDEO --}}
  @include('admin/components/uploads/video-add')
  
  {{-- TEACHER --}}
  <div class="form-group">
    <select name="teacher_id" class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}">
      <option selected disabled>Choose the teacher</option>
      @foreach($teachers as $teacher)
      <option value="{{$teacher->id}}" @old('teacher_id', $teacher->id) selected @endold>{{$teacher->full_name}}</option>
      @endforeach
    </select>
    @if ($errors->has('teacher_id'))
    <div class="invalid-feedback">
      {{ $errors->first('teacher_id') }}
    </div>
    @endif
  </div>
  
</div>