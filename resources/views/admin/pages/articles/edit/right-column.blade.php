<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  {{-- TITLE --}}
  <div class="form-group edit-control" id="title-{{$article->id}}" name="title">

    @component('components/editing/label', [
      'title' => 'The title of this article is',
      'id' => "title-{$article->id}",
      'path' => "/admin/articles/{$article->id}"
    ])
    @endcomponent
    
    <input type="text" disabled class="form-control" value="{{$article->title}}" name="title" placeholder="Title" >

  </div>

  @if(request()->has('blog'))
  {{-- AUTHOR --}}
  <div class="form-group edit-control" id="author-{{$article->id}}" name="author_id">

    @component('components/editing/label', [
      'title' => 'The author of this article is',
      'id' => "author-{$article->id}",
      'path' => "/admin/articles/{$article->id}"
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

    @component('components/editing/label', [
      'title' => 'The subject of this article is',
      'id' => "subject-{$article->id}",
      'path' => "/admin/articles/{$article->id}"
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
  
  {{-- SUMMARY --}}
  <div class="form-group edit-control" id="summary-{{$article->id}}" name="summary">
    
    @include('components/editing/label', [
      'title' => 'The summary of this article is',
      'id' => "summary-{$article->id}",
      'path' => "/admin/articles/{$article->id}"
    ])

    <textarea class="form-control" disabled rows="5" name="summary" maxlength="380" placeholder="Summary">{{$article->summary}}</textarea>

  </div>

  {{-- CONTENT --}}
  <div class="form-group edit-control" id="content-{{$article->id}}" name="content">
    
    @include('components/editing/label', [
      'title' => 'The content of this article is',
      'id' => "content-{$article->id}",
      'path' => "/admin/articles/{$article->id}"
    ])

    <input type="hidden" bind="trix" id="trix-content" name="content" value="{{strip_tags($article->content, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')}}">
    <trix-editor input="trix-content" style="height: 480" class="trix-disabled"></trix-editor>

  </div>

</div>