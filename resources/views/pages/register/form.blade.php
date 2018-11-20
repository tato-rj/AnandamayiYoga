<form method="POST" id="{{$formId ?? 'register-form'}}" action="{{$action ?? route('register')}}">
    {{csrf_field()}}
    <input type="hidden" name="timezone" value="">
    <input type="hidden" name="level_id" value>
    <input type="hidden" name="categories" value>
    <div class="form-group">
        <input id="first_name" type="text" class="form-control bg-light {{ $errors->has('first_name') ? 'is-invalid' : 'border-0' }}" name="first_name" placeholder="@lang('First name')" value="{{ old('first_name') }}" required autofocus>

        @error(['field' => 'first_name'])
    </div>

    <div class="form-group">
        <input id="last_name" type="text" class="form-control bg-light {{ $errors->has('last_name') ? 'is-invalid' : 'border-0' }}" name="last_name" placeholder="@lang('Last name')" value="{{ old('last_name') }}" required autofocus>

        @error(['field' => 'last_name'])
    </div>
    <div class="form-group">
        <select class="form-control bg-light text-muted {{ $errors->has('gender') ? 'is-invalid' : 'border-0' }}" name="gender" required>
            <option value="" selected disabled>@lang('Select your gender')</option>
            <option value="female" @old('gender', 'female') selected @endold>@lang('Female')</option>
            <option value="male" @old('gender', 'male') selected @endold>@lang('Male')</option>
        </select>

        @error(['field' => 'gender'])
    </div>
    <div class="form-group">
        <input id="email" type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

        @error(['field' => 'email'])
    </div>

    <div class="form-group">
        <input id="password" type="password" class="form-control bg-light {{ $errors->has('password') ? 'is-invalid' : 'border-0' }}" placeholder="Password" name="password" required>

        @error(['field' => 'password'])
    </div>

    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control bg-light {{ $errors->has('password_confirmation') ? 'is-invalid' : 'border-0' }}" placeholder="@lang('Confirm your password')" name="password_confirmation" required>
    </div>

    {{$stripe ?? null}}

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('agreement') ? 'is-invalid' : '' }}" required name="agreement" type="checkbox" value="1" id="agreement-checkbox">
            <label class="form-check-label" for="agreement-checkbox">
                <small>@lang('I agree to the') <a class="link-default" href="{{route('support.terms')}}" target="_blank">@lang('Terms & Conditions')</a></small>
            </label>

            @error(['field' => 'agreement'])
        </div>
    </div>

    <div class="form-group mt-4">
        {{$submitButton}}
    </div>

    @if (empty($stripe))
    <div class="form-group text-muted">
        <small>@lang('After registering, you will receive a confirmation email. Confirm your contact and your trial period will automatically begin! We encourage you to start customizing your profile and discover all of what our platform have to offer. Check out our resources about') <a href="{{route('support.membership')}}" class="link-default" target="_blank">@lang('membership')</a> @lang('to learn how you can become a member.')</small>
    </div>
    @endif
</form>