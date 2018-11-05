<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  <div class="form-group">
    @include('admin.components.input-lang')
  </div>

  {{-- TITLE --}}
  <div class="form-group">
    @input(['lang' => 'en', 'name' => 'title', 'label' => 'Title', 'value' => old('title')])
    <p class="m-0 ml-2 text-danger" id="validate-title" style="display: none;"><small>A lesson with this title already exists</small></p>
    @input(['lang' => 'pt', 'name' => 'title_pt', 'label' => 'Título', 'value' => old('title_pt')])
  </div>

  @if(! request()->has('learning'))
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
  <input type="hidden" name="author_id" value="{{anandamayi()->exists() ? anandamayi()->id : null}}">
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
    @textarea(['lang' => 'en', 'limit' => 380, 'name' => 'summary', 'label' => 'Summary (max 380 characters)', 'value' => old('summary')])
    @textarea(['lang' => 'pt', 'limit' => 380, 'name' => 'summary_pt', 'label' => 'Resumo (limite de 380 characteres)', 'value' => old('summary_pt')])
  </div>

  {{-- CONTENT --}}
  <div class="form-group">
    @trix(['lang' => 'en', 'name' => 'content', 'label' => 'Content', 'value' => old('content')])
    @trix(['lang' => 'pt', 'name' => 'content_pt', 'label' => 'Conteúdo', 'value' => old('content_pt')])
  </div>

  <div class="form-group text-right">
    
    @include('components/buttons/spinner', [
      'classes' => 'btn btn-red block-screen-button',
      'label' => 'All done, create the article!'])

  </div>
</div>