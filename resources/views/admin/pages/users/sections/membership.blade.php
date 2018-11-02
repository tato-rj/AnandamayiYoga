@component('admin/pages/users/sections/layout')
@slot('title')
<div class="d-flex justify-content-between">Membership
<span>
  @if($user->isOnGracePeriod())
  <small class="text-muted">The grace period ends on <strong class="text-warning">{{$user->membership->subscription_ends_at->toFormattedDateString()}}</strong></small>
  @elseif($user->isOnTrial())
  <small class="text-muted">The trial period ends on <strong class="text-success">{{$user->trial_ends_at->toFormattedDateString()}}</strong></small>
  @endif
</span>
</div>
@endslot

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="px-3">
    <label class="m-0"><small><strong>Card Information</strong></small></label>
    @if($user->hasMembership())    
      <p class="mb-1"><strong>{{$user->membership->card_brand}}</strong> {{$user->membership->formatted_card_last_four}}</p>
    @else
      <p class="mb-1">{{$user->first_name}} is not being charged.</p>
    @endif
  </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="px-3">
    <label class="m-0"><small>
      <strong>Last payment</strong>
    @if($user->payments()->exists())
      | <a href="/admin/users/{{$user->id}}/invoices" class="link-blue">view all</a>
      </small></label>
      <p class="mb-1">
        <strong>{{$user->payments->first()->usd}}</strong> paid on {{$user->payments->first()->created_at->toFormattedDateString()}}
      </p>
    @else
      </small></label>
      <p class="mb-1 text-muted">
        No payments ever made
      </p>
    @endif
  </div>
</div>

@endcomponent