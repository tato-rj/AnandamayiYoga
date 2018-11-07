<div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-4">
  <div class="rounded border hover-shadow-light p-0 t-2 h-100">
    <div class="bg-full rounded-top position-relative" 
         style="background-image:url({{cloud($asana->image_path)}}); height: 160px;">

      @if($asana->video_path)
        @include('components/icons/film')
      @endif

     @include('admin.components.cards.controls', [
        'model' => $asana, 
        'routes' => [
          'edit' => route('admin.asanas.update', $asana->slug), 
          'delete' => route('admin.asanas.destroy', $asana->slug)]])

    </div>
    <div class="px-3 py-2">
        <p class="clamp-1 m-0 l-height-1"><strong>{{$asana->name}}</strong></p>
        <p class="clamp-1 text-muted"><small>{{$asana->sanskrit}}</small></p>
        @include('components/lesson/levels', ['lesson' => $asana])
    </div>
  </div>
</div>