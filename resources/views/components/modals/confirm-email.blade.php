@component('components/modals/layout', [
	'id' => 'confirm-email',
	'title' => 'We\'re almost there!',
	'size' => 'modal-dialog-centered'
	])
<div class="modal-body">
    <div class="text-center">
        @if(session()->has('course_purchased'))
            <h4>@lang('Thank you for your purchase!')</h4>
            <p>@lang('Before you can start the course, we just need you to confirm your email.')</p>
        @elseif(session()->has('purchase_error'))
            <h4>@lang('Thank you for signing up!')</h4>
            <p>@lang('Your registration was successful, but we couldn\'t proccess your purchase.')</p>
            <div class="alert alert-danger" role="alert">{{session('purchase_error')}}</div>
            <p>@lang('Before you can fix the problem, we just need you to confirm your email.')</p>
        @else
            <p class="mb-2">@lang('Please confirm your email:')</p>
            <p class="text-muted">{{session('confirm-email')}}</p>
        @endif
        
        <img src="{{cloud('app/misc/envelope.svg')}}" style="width: 6em" class="mb-3">
    	
        <p class="mb-4">@lang('Your security and privacy are extremely important to us. Please verify your email address by clicking on the button in the email we sent you.')</p>
    	<p><strong>@lang('Haven\'t received anything?')</strong></p>
    	<form method="POST" action="/register/confirm">
    		{{csrf_field()}}
    		<input type="hidden" name="email" value="{{session('confirm-email')}}">
            
            @include('components/buttons/form', [
                'label' => 'Click here to receive a new one',
                'weight' => 'bold'])

    	</form>
    </div>
</div>
@endcomponent
