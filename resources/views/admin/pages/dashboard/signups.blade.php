<div class="card card--inverse widget-signups">
  <div class="card-body">
      <h5 class="mb-4">Most Recent Signups</h5>
      <div class="widget-signups__list">
          @forelse($latestUsers as $user)
          <a data-toggle="tooltip" title="{{$user->fullName}}" href="/office/users/{{$user->id}}">
            <img class="avatar-img" src="{{$user->avatar()}}" alt=""
            @notActive($user)
              style="filter: grayscale(100);"
            @endnotActive
            >
          </a>
          @empty
          <p>No users to show</p>
          @endforelse
      </div>
  </div>
</div>