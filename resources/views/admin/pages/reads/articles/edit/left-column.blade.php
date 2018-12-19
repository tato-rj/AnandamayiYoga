<div class="col-lg-3 col-md-4 col-sm-12 col-12">
	{{-- COVER IMAGE --}}
	@include('admin/components/uploads/image-edit', [
	'image' => $article->image_path,
	'path' => route('admin.reads.articles.image.update', $article->slug)])

  {{-- AUTHOR --}}
  <div class="form-group edit-control" id="author-{{$article->id}}" name="author_id">

    @component('components/form/edit/label', [
      'title' => 'The author of this article is',
      'id' => "author-{$article->id}",
      'path' => route('admin.reads.articles.update', $article->id)
    ])
    @endcomponent
    
    <select class="form-control" name="author_id" disabled>
      @foreach($teachers as $teacher)
      <option value="{{$teacher->id}}" {{$article->author_id == $teacher->id ? 'selected' : null }}>{{$teacher->name}}</option>
      @endforeach
    </select>

  </div>
{{-- TOPICS --}}
<div class="form-group edit-control" id="topics-{{$article->id}}" name="topics">

  @include('components.form.edit.label', [
    'title' => 'Article\'s topics',
    'id' => "topics-{$article->id}",
    'path' => "/admin/reads/articles/{$article->id}/topics"
  ])
  
  @foreach($topics as $topic)
  <div class="form-check custom-control custom-checkbox m-2">
    <input class="custom-control-input" 
      disabled 
      name="topics[]" 
      type="checkbox" 
      id="topic-{{$topic->id}}" 
      value="{{$topic->id}}"
      @exists($article->topics->pluck('id'), $topic->id) checked @endexists>
    <label class="mb-2 custom-control-label text-muted" for="topic-{{$topic->id}}">{{$topic->name}}</label>
  </div>
  @endforeach

</div>
</div>
