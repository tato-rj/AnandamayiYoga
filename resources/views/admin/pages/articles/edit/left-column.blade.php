<div class="col-lg-3 col-md-4 col-sm-12 col-12">
	{{-- COVER IMAGE --}}
	@include('admin/components/uploads/image-edit', [
	'image' => $article->image_path,
	'path' => "/office/articles/{$article->slug}/image"])

    {{-- TOPICS --}}
    <div class="form-group edit-control" id="topic-{{$article->id}}" name="topic">

      @include('components/editing/label', [
        'title' => 'This article is about',
        'id' => "topic-{$article->id}",
        'path' => "/office/articles/{$article->id}/topics"
      ])

      <div class="row mx-2">
        @foreach($topics as $topic)
        <div class="form-check custom-control custom-checkbox col-lg-6 col-md-6 col-sm-12 col-12">
          <input class="custom-control-input" 
            disabled 
            name="topic[]" 
            type="checkbox" 
            id="topic-{{$topic->id}}" 
            value="{{$topic->id}}" 
            @exists($article->topics, $topic->id) checked @endexists>
          <label class="mb-2 custom-control-label text-muted" for="topic-{{$topic->id}}">{{$topic->name}}</label>
        </div>
        @endforeach
      </div>
    </div>
</div>
