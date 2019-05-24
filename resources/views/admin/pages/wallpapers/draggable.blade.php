<div class="edit-control form-inline ordered t-2 rounded bg-light hover-shadow-light mb-2" 
  id="{{$category->id}}"
  data-name="{{$category->name}}"
  data-name_pt="{{$category->name_pt}}"
  data-path="{{route('admin.wallpapers.categories.sort', $category->id)}}">

  {{-- SORT HANDLE --}}
  <div class="px-3 py-1 sort-handle cursor-pointer">
    <i class="fas fa-sort"></i>
  </div>
  {{-- INPUTS --}}
  <div class="flex-grow-2 p-1">
    <input type="hidden" name="sorting_order" data-id="{{$category->id}}" value="{{$category->sorting_order}}">
    <p class="my-1">{{$category->name}}</p>
  </div>
  {{-- ACTION BUTTONS --}}
  <div class="text-right px-1 py-1">
    <span class="badge cursor-pointer text-warning open-edit-modal"><a href="{{route('admin.wallpapers.show', $category->id)}}" class="link-none">Edit</a></span>
    
    <i class="fas text-danger fa-trash-alt mx-2 cursor-pointer delete" 
      data-path="/admin/wallpapers/categories/{{$category->id}}" 
      data-toggle="modal" 
      data-target="#delete-confirm"></i>
  </div>
</div>
