<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
  <div class="bg-full rounded position-relative" 
       style="background-image:url({{cloud($asana->image_path)}}); height: 160px;">

    @if($asana->video_path)
      @include('components/icons/film')
    @endif
    
    <div class="show-on-hover">
        <div class="m-0 absolute-center text-white z-10 d-flex align-items-center justify-content-between bg-light rounded shadow-dark">
            <a href="/office/asanas/{{$asana->slug}}">
              <i class="fas fa-edit fa-lg m-2 cursor-pointer text-warning edit" data-id="{{$asana->id}}"></i>
            </a>
            <i class="fas text-danger fa-trash-alt m-2 fa-lg cursor-pointer delete" data-path="/office/asanas/{{$asana->slug}}" data-toggle="modal" data-target="#delete-confirm"></i>
        </div>
        <div class="overlay w-100 h-100 bg-light z-0"></div>                
    </div>
  </div>
  <div class="px-3 py-2">
      <p class="clamp-1 m-0 l-height-1"><strong>{{$asana->name}}</strong></p>
      <p class="clamp-1 m-0 text-muted"><small>{{$asana->sanskrit}}</small></p>
      @include('components/lesson/levels', ['lesson' => $asana])
  </div>
</div>