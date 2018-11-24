<div class="col-lg-3 col-md-4 col-sm-12 col-12">
	{{-- COVER IMAGE --}}
	@include('admin/components/uploads/image-edit', [
	'image' => $article->image_path,
	'path' => route('admin.reads.articles.image.update', $article->slug)])

  {{-- TOPIC --}}
  <div class="form-group edit-control" name="topic_id" id="topic_id-{{$article->id}}">
    
    @include('components.form.edit.label', [
      'title' => 'This article is about',
      'id' => "topic_id-{$article->id}",
      'path' => route('admin.reads.articles.update', $article->id)
    ])

    <select disabled class="form-control">
      @foreach($topics as $topic)
        <option value="{{$topic->id}}" @match($article->topic_id, $topic->id) selected @endmatch>{{$topic->name}}</option>
      @endforeach
    </select>

  </div>
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
</div>
