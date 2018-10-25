<div class="col-6">
  <p class="text-muted mb-1"><small>Drag and drop lessons here</small></p>
  <ul id="sortable-selections" class="form-group rounded border px-1 pt-1 connectedSortable" style="height: 160px; overflow-y: scroll;">

    {{$existingLessons or null}}

  </ul>
</div>
<div class="col-6">
  <p class="text-muted mb-1"><small>Available lessons</small></p>
  <ul id="sortable-all" class="form-group rounded border px-1 pt-1 connectedSortable" style="height: 160px; overflow-y: scroll;">

    @foreach($lessons as $lesson)
      @include('admin/components/dragndrop/item')
    @endforeach
  
  </ul>
</div>