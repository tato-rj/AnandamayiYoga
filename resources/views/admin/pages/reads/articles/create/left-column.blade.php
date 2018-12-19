<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  {{-- COVER IMAGE --}}
  @include('admin/components/uploads/image-add')
  {{-- TOPICS --}}
  <div class="form-group col-8">
      <label class="d-block text-muted"><small>This article is about</small></label>
      @foreach($topics as $topic)
      <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
        <input required class="custom-control-input" 
          name="topics[]" 
          type="checkbox" 
          id="topic-{{$topic->id}}" 
          value="{{$topic->id}}">
        <label class="mb-2 custom-control-label text-muted" for="topic-{{$topic->id}}">{{$topic->name}}</label>
      </div>
      @endforeach
    @if ($errors->has('topics'))
    <div class="invalid-feedback">
      {{ $errors->first('topics') }}
    </div>
    @endif
  </div>
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
</div>
