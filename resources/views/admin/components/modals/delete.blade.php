<div class="modal fade" id="delete-confirm{{$item or null}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$slot}}
        <small class="text-danger mb-4 d-block">This action cannot be undone</small>
        <div class="text-right">
          <form action="" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger">Yes, go ahead</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>