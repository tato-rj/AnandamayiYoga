<div class="col-lg-9 col-md-8 col-sm-12 col-12">
  {{-- TITLE --}}
  <div class="form-group edit-control" id="title-{{$article->id}}" name="title">

    @component('components/editing/label', [
      'title' => 'The title of this article is',
      'id' => "title-{$article->id}",
      'path' => "/office/articles/{$article->id}"
    ])
    @endcomponent
    
    <input type="text" disabled class="form-control" value="{{$article->title}}" name="title" placeholder="Title" >

  </div>

  {{-- TITLE --}}
  <div class="form-group edit-control" id="author-{{$article->id}}" name="author">

    @component('components/editing/label', [
      'title' => 'The author of this article is',
      'id' => "author-{$article->id}",
      'path' => "/office/articles/{$article->id}"
    ])
    @endcomponent
    
    <input type="text" disabled class="form-control" value="{{$article->author}}" name="author" placeholder="Author(s)" >

  </div>
  
  {{-- SUMMARY --}}
  <div class="form-group edit-control" id="summary-{{$article->id}}" name="summary">
    
    @include('components/editing/label', [
      'title' => 'The summary of this article is',
      'id' => "summary-{$article->id}",
      'path' => "/office/articles/{$article->id}"
    ])

    <textarea class="form-control" disabled rows="5" name="summary" placeholder="Summary">{{$article->summary}}</textarea>

  </div>

  {{-- CONTENT --}}
  <div class="form-group edit-control" id="content-{{$article->id}}" name="content">
    
    @include('components/editing/label', [
      'title' => 'The content of this article is',
      'id' => "content-{$article->id}",
      'path' => "/office/articles/{$article->id}"
    ])

    <input type="hidden" bind="trix" id="trix-content" name="content" value="{{strip_tags($article->content, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')}}">
    <trix-editor input="trix-content" style="height: 480" class="trix-disabled"></trix-editor>

  </div>

</div>