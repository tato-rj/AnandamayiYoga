<div class="edit-control form-inline flex-nowrap ordered t-2 rounded bg-light hover-shadow-light mb-2" 
  id="{{$article->id}}"
  data-path="{{route('admin.articles.update', $article->id)}}">

  {{-- SORT HANDLE --}}
  <div class="px-3 py-1 sort-handle cursor-pointer">
    <i class="fas fa-sort"></i>
  </div>

  {{-- INPUTS --}}
  <div class="text-truncate flex-grow-1 p-1">
    <input type="hidden" name="order" data-id="{{$article->id}}" value="{{$article->order}}">
    <p class="my-1 text-truncate">{{$article->title}}</p>
  </div>
  
  {{-- ACTION BUTTONS --}}
  <div class="text-right text-nowrap px-1 py-1">
    <span class="text-muted text-nowrap"><small><strong>{{slug_str($article->subject)}}</strong></small></span>
    <a href="/admin/articles/{{$article->slug}}" class="badge cursor-pointer text-warning link-none">Edit</a>
    
    <i class="fas text-danger fa-trash-alt mx-2 cursor-pointer delete" 
      data-path="/admin/articles/{{$article->slug}}" 
      data-toggle="modal" 
      data-target="#delete-confirm"></i>
  </div>
</div>
