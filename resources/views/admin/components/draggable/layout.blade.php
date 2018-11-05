<div class="edit-control form-inline ordered t-2 rounded bg-light hover-shadow-light mb-2" 
  id="{{$model->id}}"
  data-name="{{$model->name}}"
  data-name_pt="{{$model->name_pt}}"
  data-path="{{$editPath}}">

  {{-- SORT HANDLE --}}
  <div class="px-3 py-1 sort-handle cursor-pointer">
    <i class="fas fa-sort"></i>
  </div>
  {{-- INPUTS --}}
  <div class="flex-grow-2 p-1">
    <input type="hidden" name="order" data-id="{{$model->id}}" value="{{$model->order}}">
    <p class="my-1">{{$model->name}}</p>
  </div>
  {{-- ACTION BUTTONS --}}
  <div class="text-right px-1 py-1">
    <span class="badge cursor-pointer text-warning open-edit-modal"
      data-toggle="modal"      
      data-target="#edit-modal">Edit</span>
    
    <i class="fas text-danger fa-trash-alt mx-2 cursor-pointer delete" 
      data-path="{{$deletePath}}" 
      data-toggle="modal" 
      data-target="#delete-confirm"></i>
  </div>
</div>
