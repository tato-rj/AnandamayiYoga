<div class="px-2 mb-3 d-flex justify-content-between">
    <div>
        @if(!is_null($previous))
        <a href="{{$program->path()}}/{{$previous}}" class="btn btn-blue btn-xs">
           <i class="fas fa-caret-left mr-2"></i> Previous
        </a>
        @endif
    </div>
    <div>
        @if(!is_null($next))
        <a href="{{$program->path()}}/{{$next}}" class="btn btn-blue btn-xs">
           Next<i class="fas ml-2 fa-caret-right"></i>
        </a>
        @endif
    </div>               
</div>