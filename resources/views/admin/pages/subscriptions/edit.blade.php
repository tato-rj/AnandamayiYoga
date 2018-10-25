@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Manage the subscription'])
  @slot('subtitle')
    <a href="{{route('admin.subscriptions.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all subscriptions</a>
  @endslot
@endcomponent

<div class="row">

  <ul class="list-style-none px-2">
    <li class="m-2"><span class="text-muted"><i class="far fa-envelope mr-2"></i></span> {{$subscription->email}}</li>
    <li class="m-2"><span class="text-muted"><i class="far fa-calendar-alt mr-2"></i></span> Added on {{$subscription->created_at->toFormattedDateString()}}</li>
    <li class="m-2"><span class="text-muted"><i class="far fa-address-card mr-2"></i></span>
    	@if(! $subscription->user())
    	<span class="text-muted">Not a member</span>
    	@elseif($subscription->user()->isOnTrial())
    	<span class="text-warning">On trial period</span>
    	@elseif($subscription->user()->hasMembership())
    	<span class="text-success">Active member</span>
    	@elseif($subscription->user()->isOnGracePeriod())
    	<span class="text-warning">On grace period</span>
    	@else
    	<span class="text-danger">Membership has expired</span>
    	@endif
    </li>
  </ul>

</div>

<div class="mb-4">
	<form method="POST" action="{{route('subscriptions.destroy', $subscription->list)}}">
		{{csrf_field()}}
		{{method_field('DELETE')}}
		<input type="hidden" name="subscription_email" value="{{$subscription->email}}">
		<p>Do you want to remove <strong>{{$subscription->email}}</strong> from the <strong>{{$subscription->list}}</strong> list?</p>
		<button type="submit" class="btn-bold btn-xs btn-red">Click here</button>
	</form>
</div>
<div class="bg-light rounded px-4 py-3 d-inline-block">
	<p class="mb-2">Other lists it may also belong to:</p>
	<div class="m-1">
	  	@foreach($lists as $list)
		<div class="custom-control custom-checkbox">
		  <input class="custom-control-input" 
		  	type="checkbox" {{\App\Subscription::$list()->contains($subscription->email) ? 'checked' : null}} 
		  	id="subscription-{{$list}}"
		  	data-route="/subscriptions/{{$list}}"
		  	data-email="{{$subscription->email}}">
		  <label class="custom-control-label" for="subscription-{{$list}}">{{ucfirst($list)}} list</label>
		</div>
		@endforeach
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
$('input[type="checkbox"]').on('click', function(event) {
	$button = $(this);
	$email = $button.attr('data-email');
	$url = $button.attr('data-route');
	$method = ($button.is(':checked')) ? 'POST' : 'DELETE';

	$.ajax({
	   url: $url,
	   type: $method,
	   data: {
	      subscription_email: $email
	   },
	   error: function(response) {
        $errors = response.responseJSON.errors.subscription_email;
        showAlert('danger', $errors);
	   },
	   success: function(response) {
	   		showAlert('success', response);
	   }
	});
});

</script>
</script>
@endsection