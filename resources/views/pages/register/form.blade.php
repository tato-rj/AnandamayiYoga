<form method="POST" id="{{$formId or 'register-form'}}" action="{{$action or route('register')}}">
    {{csrf_field()}}
    <input type="hidden" name="timezone" value="">
    <input type="hidden" name="level_id" value>
    <input type="hidden" name="categories" value>
    <div class="form-group">
        <input id="first_name" type="text" class="form-control bg-light {{ $errors->has('first_name') ? 'is-invalid' : 'border-0' }}" name="first_name" placeholder="First name" value="{{ old('first_name') }}" required autofocus>

        @if ($errors->has('first_name'))
        <div class="invalid-feedback">
            {{ $errors->first('first_name') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <input id="last_name" type="text" class="form-control bg-light {{ $errors->has('last_name') ? 'is-invalid' : 'border-0' }}" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" required autofocus>

        @if ($errors->has('last_name'))
        <div class="invalid-feedback">
            {{ $errors->first('last_name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <select class="form-control bg-light text-muted {{ $errors->has('gender') ? 'is-invalid' : 'border-0' }}" name="gender" required>
            <option value="" selected disabled>Select your gender</option>
            <option value="female" @old('gender', 'female') selected @endold>Female</option>
            <option value="male" @old('gender', 'male') selected @endold>Male</option>
        </select>

        @if ($errors->has('gender'))
        <div class="invalid-feedback">
            {{ $errors->first('gender') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <input id="email" type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <input id="password" type="password" class="form-control bg-light {{ $errors->has('password') ? 'is-invalid' : 'border-0' }}" placeholder="Password" name="password" required>

        @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control bg-light {{ $errors->has('password_confirmation') ? 'is-invalid' : 'border-0' }}" placeholder="Confirm your passowrd" name="password_confirmation" required>
    </div>

    {{$stripe or null}}

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('agreement') ? 'is-invalid' : '' }}" required name="agreement" type="checkbox" value="1" id="agreement-checkbox">
            <label class="form-check-label" for="agreement-checkbox">
                I agree to the <a class="link-default" href="{{route('support.terms')}}" target="_blank">Terms & Conditions</a>
            </label>
            @if ($errors->has('agreement'))
            <div class="invalid-feedback">
                {{ $errors->first('agreement') }}
            </div>
            @endif
        </div>
    </div>

    <div class="form-group mt-4">
        {{$submitButton}}
    </div>

    @if (empty($stripe))
    <div class="form-group text-muted">
        <small>After registering, you will receive a confirmation email. Confirm your contact and your <u>trial period will automatically begin</u>! We encourage you to start customizing your profile and discover all of what our platform have to offer. Check out our resources about <a href="{{route('support.membership')}}" class="link-default" target="_blank">membership</a> to learn how you can become a member.</small>
    </div>
    @endif
</form>