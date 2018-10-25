@if(! $user->confirmed)
  <span class="m-0 text-secondary">not confirmed</span>
@else
  @if($user->isOnTrial())
  <span class="m-0 text-warning">on Trial</span>
  @elseif($user->hasMembership())
  <span class="m-0 text-success">active</span>
  @elseif($user->isOnGracePeriod())
  <span class="m-0 text-warning">on grace period</span>
  @else
  <span class="m-0 text-danger">inactive</span>
  @endif
@endif