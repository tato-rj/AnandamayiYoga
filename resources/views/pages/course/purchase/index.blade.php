@extends('layouts/app')

@section('head')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="container-fluid">

  @include('pages/course/purchase/lead')
   
  @include('pages/course/purchase/content')

	@include('components/modals/confirm-purchase', ['item' => $course])

  @include('pages/course/guidelines')
  
</div>
@endsection

@section('scripts')
<script type="text/javascript">

if ($('#card-element').length) {
  // Create a Stripe client.
  var stripe = Stripe(app.stripe_key);

  // Create an instance of Elements.
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
    base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };

  // Create an instance of the card Element.
  var card = elements.create('card', {
  	style: style,
  	hidePostalCode: true
  });

  // Add an instance of the card Element into the `card-element` <div>.
  card.mount('#card-element');

  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');

    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
    
  });

  // Handle form submission.
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        if (! $('label.error').is(':visible'))
          stripeTokenHandler(result.token);
      }
    });  	
  });

  function stripeTokenHandler(token) {
  	// Insert the token ID into the form so it gets submitted to the server
  	$('#stripeToken').val(token.id);
    // Display coupon
    $('#item-coupon').text($('input[name="coupon"]').val());
  	// Submit the form
  	$('#confirm-purchase').modal('show');
  }
}

</script>
@endsection