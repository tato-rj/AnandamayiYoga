<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  <div class="form-group">
    @include('admin.components.input-lang')
  </div>

  @editInput([
    'name' => 'title', 
    'label' => 'The title of this article is', 
    'lang' => 'en', 
    'id' => "title-{$article->id}", 
    'path' => route('admin.articles.update', $article->id),
    'value' => $article->title
    ])

  @editInput([
    'name' => 'title_pt', 
    'label' => 'O título desse artigo é', 
    'lang' => 'pt', 
    'id' => "title_pt-{$article->id}", 
    'path' => route('admin.articles.update', $article->id),
    'value' => $article->title_pt
    ])

  @if(! $article->isBlog)
  {{-- AUTHOR --}}
  <div class="form-group edit-control" id="author-{{$article->id}}" name="author_id">

    @component('components/form/edit/label', [
      'title' => 'The author of this article is',
      'id' => "author-{$article->id}",
      'path' => route('admin.articles.update', $article->id)
    ])
    @endcomponent
    
    <select class="form-control" name="author_id" disabled>
      <option disabled selected>Written by</option>
      @foreach($teachers as $teacher)
      <option value="{{$teacher->id}}" {{$article->author_id == $teacher->id ? 'selected' : null }}>{{$teacher->name}}</option>
      @endforeach
    </select>

  </div>
  @else
  {{-- SUBJECT --}}
  <div class="form-group edit-control" id="subject-{{$article->id}}" name="subject">

    @component('components/form/edit/label', [
      'title' => 'The subject of this article is',
      'id' => "subject-{$article->id}",
      'path' => route('admin.articles.update', $article->id)
    ])
    @endcomponent
    
    <select class="form-control" name="subject" disabled>
      <option disabled selected>Subject</option>
      @foreach(\App\Article::subjects() as $subject)
      <option value="{{str_slug($subject)}}" {{$article->subject == str_slug($subject) ? 'selected' : null }}>{{$subject}}</option>
      @endforeach
    </select>

  </div>

  @endif
  
  @editTextarea([
  'name' => 'summary', 
  'label' => 'The summary of this article is', 
  'lang' => 'en', 
  'id' => "summary-{$article->id}", 
  'path' => route('admin.articles.update', $article->id),
  'value' => $article->summary
  ])
  
  @editTextarea([
  'name' => 'summary_pt', 
  'label' => 'O resumo desse artigo é', 
  'lang' => 'pt', 
  'id' => "summary_pt-{$article->id}", 
  'path' => route('admin.articles.update', $article->id),
  'value' => $article->summary_pt
  ])

  @editTrix([
    'name' => 'content', 
    'label' => 'The content of this article is', 
    'lang' => 'en', 
    'id' => "content-{$article->id}", 
    'path' => route('admin.articles.update', $article->id),
    'value' => strip_tags($article->content, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
    ])

  @editTrix([
    'name' => 'content_pt', 
    'label' => 'O conteúdo desse artigo é', 
    'lang' => 'pt', 
    'id' => "content_pt-{$article->id}", 
    'path' => route('admin.articles.update', $article->id),
    'value' => strip_tags($article->content_pt, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
    ])

</div>