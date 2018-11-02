<input type="hidden" name="stripeToken" id="stripeToken">
<input type="hidden" name="stripeEmail" id="stripeEmail" value="{{$email}}">
<input type="hidden" name="planId" id="planId">
<input type="hidden" name="type" id="type" value="{{$productType ?? null}}">
<input type="hidden" name="typeId" id="typeId" value="{{$productId ?? null}}">
@auth
<input type="hidden" name="first_name" value="{{auth()->user()->first_name}}">
<input type="hidden" name="last_name" value="{{auth()->user()->last_name}}">
<input type="hidden" name="email" value="{{auth()->user()->email}}">
@endauth

<div id="card-element"></div>

<div id="card-errors" class="mt-1 text-danger" style="font-size: .75em" role="alert"></div>

<div class="inner-addon left-addon mt-2">
  <i class="fas fa-tag"></i>
  <input type="text" name="coupon" placeholder="Have a coupon code?" class="form-control border-top-0 border-right-0 border-left-0 border-bottom rounded-0">
</div>