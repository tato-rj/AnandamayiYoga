<div class="row quick-stats">
    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item bg-blue position-relative">
            <div class="text-white">
                <h5 class="m-0"><strong>{{$membership->count()}}</strong></h5>
                <p class="m-0">Active Members</p>
            </div>
            <i class="fas fa-users fa-5x position-absolute text-white" style="top: 0; right: 0; opacity: 0.4; transform: rotate(20deg);"></i>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item bg-amber position-relative">
            <div class="text-white">
                <h5 class="m-0"><strong>{{-- {{$visits->total('lessons')}} --}}0</strong></h5>
                <p class="m-0">Classes views</p>
            </div>
            <i class="fas fa-globe fa-5x position-absolute text-white" style="top: 0; right: 0; opacity: 0.4; transform: rotate(20deg);"></i>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item bg-red position-relative">
            <div class="text-white">
                <h5 class="m-0"><strong>{{$numberOfClasses}}</strong></h5>
                <p class="m-0">Published classes</p>
            </div>
            <i class="fas fa-video fa-5x position-absolute text-white" style="top: 0; right: 0; opacity: 0.4; transform: rotate(20deg);"></i>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item bg-purple position-relative">
            <div class="text-white">
                <h5 class="m-0"><strong>${{$membership->balance()}}</strong></h5>
                <p class="m-0">Net Income</p>
            </div>
            <i class="fas fa-piggy-bank fa-5x position-absolute text-white" style="top: 0; right: 0; opacity: 0.4; transform: rotate(20deg);"></i>
        </div>
    </div>

</div>