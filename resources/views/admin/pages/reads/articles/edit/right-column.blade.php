<div class="col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
  <div class="form-group d-flex align-items-center justify-content-between">
    @include('admin.components.input-lang')
    <div id="pin" class="cursor-pointer" title="Click to pin this article to the top">
        <i class="fas fa-thumbtack {{$article->is_pinned ? 'text-blue' : null}}" data-path="{{route('admin.reads.articles.update', $article->id)}}"></i>
        <input type="hidden" name="is_pinned" value="{{$article->is_pinned}}">
    </div>
  </div>

  @editInput([
    'name' => 'title', 
    'label' => 'The title of this article is', 
    'lang' => 'en', 
    'id' => "title-{$article->id}", 
    'path' => route('admin.reads.articles.update', $article->id),
    'value' => $article->title
    ])

  @editInput([
    'name' => 'title_pt', 
    'label' => 'O título desse artigo é', 
    'lang' => 'pt', 
    'id' => "title_pt-{$article->id}", 
    'path' => route('admin.reads.articles.update', $article->id),
    'value' => $article->title_pt
    ])
    
  @editTrix([
    'name' => 'content', 
    'label' => 'The content of this article is', 
    'lang' => 'en', 
    'id' => "content-{$article->id}", 
    'path' => route('admin.reads.articles.update', $article->id),
    'value' => strip_tags($article->content, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
    ])

  @editTrix([
    'name' => 'content_pt', 
    'label' => 'O conteúdo desse artigo é', 
    'lang' => 'pt', 
    'id' => "content_pt-{$article->id}", 
    'path' => route('admin.reads.articles.update', $article->id),
    'value' => strip_tags($article->content_pt, '<br><strong><em><img><sub><sup><small><div><h1><h2><p>')
    ])

</div>