@component('components/modals/layout', [
	'id' => 'confirm-email',
	'title' => 'We\'re almost there!',
	'size' => 'modal-dialog-centered'
	])
<div class="modal-body">
    <div class="text-center">
        @if(session()->has('course_purchased'))
            <h4>Thank you for your purchase!</h4>
            <p>Before you can start the course, we just need you to confirm your email.</p>
        @elseif(session()->has('purchase_error'))
            <h4>Thank you for signing up!</h4>
            <p>Your registration was successful, but we couldn't proccess your purchase.</p>
            <div class="alert alert-danger" role="alert">{{session('purchase_error')}}</div>
            <p>Before you can fix the problem, we just need you to confirm your email.</p>
        @else
            <h4 class="mb-2">Please confirm your email!</h4>
            <p class="text-muted">{{session('confirm-email')}}</p>
        @endif
        
        <img src="{{cloud('app/misc/envelope.svg')}}" style="width: 6em" class="mb-3">
    	
        <p class="mb-4">Your security and privacy are extremely important to us. Please <u>verify your email address</u> by clicking on the button in the email we sent you.</p>
    	<p><strong>Haven't received anything?</strong></p>
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
