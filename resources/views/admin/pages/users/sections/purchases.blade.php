@component('admin/pages/users/sections/layout')
@slot('title')
<div class="d-flex justify-content-between">
  <span>Purchases</span>
  <a href="/admin/users/{{$user->id}}/invoices" class="link-blue"><small>view all</small></a>
</div>
@endslot

<div class="col-12">
  @forelse($user->purchases as $purchase)
      <div class="d-flex px-3">
        <span><strong>{{$purchase->created_at->toFormattedDateString()}}</strong></span>
        <span class="flex-grow-1 mx-4">{{$purchase->item->name}}</span>
        @if($purchase->coupon)
        <span class="mr-4 text-muted"><small>{{$purchase->coupon}}</small></span>
        @endif
        <span>{{priceToCurrency($user->currency, $purchase->amount)}}</span>
      </div>
  @empty
  <p class="text-muted px-3 m-0"><small>Nothing to show</small></p>
  @endforelse
</div>
@endcomponent