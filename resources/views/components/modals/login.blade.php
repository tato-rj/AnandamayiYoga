@component('components/modals/layout', [
	'id' => 'login',
	'title' => 'Log In'])
	
<div class="modal-body">
	<form method="POST" action="{{ route('login') }}">
		{{csrf_field()}}
		@if($errors->has('email'))
		<div class="invalid-feedback mb-2 mt-0 text-center d-block" data-modal="login-box">
			{{$errors->first('email')}}
		</div>
		@endif
		<div class="form-group">
			<input required class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" 
			name="email" 
			placeholder="E-mail"
			value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<input required class="form-control bg-light {{ $errors->has('password') ? 'is-invalid' : 'border-0' }}" 
			type="password" 
			name="password" 
			placeholder="Password">
		</div>
		<div class="d-flex flex-wrap justify-content-between align-items-center">
			<div class="form-group m-0">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label">
						@lang('Remember me')
					</label>
				</div>
			</div>
			<div>
				<small>
					<a href="{{ route('password.request') }}">@lang('Forgot password?')</a>
				</small>
			</div>
		</div>
		
		<div class="mt-4">
			@include('components/buttons/form', [
				'label' => __('Continue'),
				'weight' => 'bold',
				'width' => 'block'])
		</div>

</div>
<div class="modal-body">
	<div class="text-center text-muted mb-4">
		<span>@lang('OR')</span>
	</div>
	@include('pages/login/social')
</div>
<div class="modal-footer flex-column">
	<small>@lang('Don\'t have an account yet?') <a href="{{ route('register') }}">@lang('Join our Membership')</a></small>
</div>
</form>
@endcomponent
