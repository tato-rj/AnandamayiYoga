  <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
    <div class="border rounded t-2 hover-shadow-light">
      <a href="/office/users/{{$user->id}}" class="link-none">
        <div class="m-3 bg-full rounded" 
        style="background-image:url({{$user->avatar()}}); height: 120px;
        @notActive($user)
          filter: grayscale(100);
        @endnotActive
        "></div>
        <div class="m-3">
          <p class="m-0 clamp-1 border-bottom mb-1 pb-1"><strong>{{$user->fullName}}</strong></p>
          <p class="m-0"><small>@include('admin/components/status')</small></p>
          <p class="m-0 l-height-1 text-muted clamp-1"><small>Joined on {{$user->created_at->toFormattedDateString()}}</small></p>
        </div>
      </a>
    </div>
  </div>