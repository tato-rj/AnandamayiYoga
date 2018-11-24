<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  {{-- AUTHOR --}}
  <div class="form-group">
    <select required class="form-control {{ $errors->has('author_id') ? 'is-invalid' : '' }}" name="author_id">
      <option disabled selected>Written by</option>
      @foreach($teachers as $teacher)
      <option value="{{$teacher->id}}" @old('teacher_id', $teacher->id) selected @endold>{{$teacher->name}}</option>
      @endforeach
    </select>
    @include('components/feedback/form', ['field' => 'subject'])
  </div>

  {{-- TOPIC --}}
  <div class="form-group">
    <select required class="form-control {{ $errors->has('topic_id') ? 'is-invalid' : '' }}" name="topic_id">
      <option disabled selected>This article is about</option>
      @foreach($topics as $topic)
      <option value="{{$topic->id}}" @old('topic_id', $topic->id) selected @endold>{{$topic->name}}</option>
      @endforeach
    </select>
    @include('components/feedback/form', ['field' => 'topic_id'])
  </div>
</div>
