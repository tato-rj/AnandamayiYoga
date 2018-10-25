<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
  <div class="rounded border">
  <div class="bg-full rounded-top position-relative" 
       style="background-image:url({{cloud($article->image_path)}}); height: 172px;">
    <div class="show-on-hover">
        <div class="m-0 absolute-center text-white z-10 d-flex align-items-center justify-content-between bg-light rounded shadow-dark">
            <a href="/office/articles/{{$article->slug}}">
              <i class="fas fa-edit fa-lg m-2 cursor-pointer text-warning edit" data-id="{{$article->id}}"></i>
            </a>
            <i class="fas text-danger fa-trash-alt m-2 fa-lg cursor-pointer delete" data-path="/office/articles/{{$article->slug}}" data-toggle="modal" data-target="#delete-confirm"></i>
        </div>
        <div class="overlay w-100 h-100 bg-light z-0"></div>                
    </div>
  </div>
  <div class="px-3 py-2">
      <p class="clamp-1 m-0 l-height-1"><strong>{{$article->title}}</strong></p>
      <p class="clamp-1 text-muted"><small>by {{$article->author}}</small></p>
      <p class="clamp-1 m-0"><small>Published on {{$article->created_at->toFormattedDateString()}}</small></p>
  </div>
</div>
</div>