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

  {{-- PROGRAM --}}
  <div class="form-group">
    <select name="program_id" class="form-control {{ $errors->has('program_id') ? 'is-invalid' : '' }}">
      <option selected disabled>Choose a program</option>
      @foreach($programs as $program)
      <option value="{{$program->id}}" @old('program_id', $program->id) selected @endold>{{$program->name}}</option>
      @endforeach
    </select>
    @if ($errors->has('program_id'))
    <div class="invalid-feedback">
      {{ $errors->first('program_id') }}
    </div>
    @endif
  </div>

</div>