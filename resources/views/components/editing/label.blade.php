<div class="d-flex justify-content-between align-items-center">
  
  <label class="d-block text-muted"><small>{{$title}}</small></label>
  
  @include('components/editing/controls', [
    'id' => $id,
    'path' => $path
  ])

</div>