<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
  <div class="rounded border">
  <div class="bg-full rounded-top position-relative" 
       style="background-image:url({{cloud($article->image_path)}}); height: 172px;">
       
       @include('admin.components.cards.controls', [
          'model' => $article, 
          'routes' => [
            'edit' => route('admin.articles.edit', $article->slug), 
            'delete' => route('admin.articles.destroy', $article->slug)]])

  </div>
  <div class="px-3 py-2">
      <p class="clamp-1 m-0 l-height-1"><strong>{{$article->title}}</strong></p>
      <p class="clamp-1 text-muted"><small>by {{$article->author->name}}</small></p>
      <p class="clamp-1 m-0"><small>Published on {{$article->created_at->toFormattedDateString()}}</small></p>
  </div>
</div>
</div>