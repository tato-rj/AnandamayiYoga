<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  {{-- TITLE --}}
  <div class="form-group">
    <input required type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Title">
    <p class="m-0 ml-2 text-danger" id="validate-name" style="display: none;"><small>An article with this title already exists</small></p>
    @include('components/feedback/form', ['field' => 'title'])
  </div>

  @if(request()->has('blog'))
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
  @else
  <input type="hidden" name="author_id" value="{{anandamayi()->id}}">
  {{-- SUBJECT --}}
  <div class="form-group">
    <select required class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject">
      <option disabled selected>Subject</option>
      @foreach(\App\Article::subjects() as $subject)
      <option value="{{str_slug($subject)}}" @old('subject', str_slug($subject)) selected @endold>{{$subject}}</option>
      @endforeach
    </select>
    @include('components/feedback/form', ['field' => 'subject'])
  </div>
  @endif

  {{-- SUMMARY --}}
  <div class="form-group">
    <textarea required class="form-control {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary" rows="5" maxlength="380" placeholder="Summary (max 380 characters)">{{old('summary')}}</textarea>
    @include('components/feedback/form', ['field' => 'summary'])
  </div>

  {{-- CONTENT --}}
  <div class="form-group">
    <input type="hidden" id="trix-content" name="content" value="{{old('content')}}">
    <trix-editor input="trix-content" placeholder="Content" required style="height: 560px"></trix-editor>
    @include('components/feedback/form', ['field' => 'content'])
  </div>

  <div class="form-group text-right">
    
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'All done, create the article!'])

  </div>
</div>