<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
  <div class="rounded border">
  <div class="bg-full rounded-top position-relative" 
       style="background-image:url({{cloud($article->image_path)}}); height: 172px;">
       
       @include('admin.components.cards.controls', [
          'model' => $article, 
          'routes' => [
            'edit' => route('admin.reads.articles.edit', $article->slug), 
            'delete' => route('admin.reads.articles.destroy', $article->slug)]])

  </div>
  <div class="px-3 py-2">
      <div class="d-flex align-items-center justify-content-between">
        <p class="clamp-1 m-0 l-height-1"><strong>{{$article->title}}</strong></p>
        @if($article->is_pinned)
        <i class="fas fa-xs fa-thumbtack text-blue"></i>
        @endif
      </div>
      <p class="clamp-1 text-muted"><small>by {{$article->author->name}}</small></p>
      <div>
        @include('components.articles.badges')
      </div>
  </div>
</div>
</div>