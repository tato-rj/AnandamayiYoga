<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog {{$size ?? null}}" role="document">
    <div class="modal-content pb-4 p-2" style="overflow: hidden;">
        <img class="d-none d-sm-flex" src="{{cloud('app/misc/lotus-pattern.png')}}" style="
    width: 80%;
    position: absolute;
    bottom: -110px;
    right: -20%;
    opacity: .02;">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"><strong>{{__($title) ?? null}}</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="col-lg-11 col-sm-12 mx-auto">
		  {{$slot}}
      </div>
    </div>
  </div>
</div>