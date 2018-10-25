<div class="modal fade" id="new-{{strtolower($title)}}{{!empty($chapter) ? '-'.$chapter->id : null}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog {{$size or 'modal-lg'}}" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{{$slot}}
      </div>
    </div>
  </div>
</div>