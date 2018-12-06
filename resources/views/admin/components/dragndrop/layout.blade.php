<div class="col-6">
  <div class="text-muted px-2 bg-light border rounded-top mt-1" style="border-bottom: 0 !important"><small><strong>Drag and drop lessons here &#8628;</strong></small></div>
  <ul id="sortable-selections" class="form-group rounded-bottom border px-1 pt-1 connectedSortable" style="height: 160px; overflow-y: scroll;">

    {{$existingLessons ?? null}}

  </ul>
</div>
<div class="col-6">
  <div class="text-muted px-2 bg-light border rounded-top mt-1" style="border-bottom: 0 !important"><small><strong>Available lessons</strong></small></div>
  <ul id="sortable-all" class="form-group rounded-bottom border px-1 connectedSortable" style="height: 160px; overflow-y: scroll;">

    @foreach($lessons as $lesson)
      @include('admin/components/dragndrop/item')
    @endforeach
  
  </ul>
</div>