<section id="scroll-mark" class="container py-4">

    @title(['title' => 'Login'])

    <div class="row">

        <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
        	<article>
                <form method="POST" action="{{route('login')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control bg-light {{ $errors->has('password') ? 'is-invalid' : 'border-0' }}" placeholder="Password" name="password" required>

                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="invalidCheck3">
                                <small>@lang('Remember me')</small>
                            </label>
                            @if ($errors->has('remember'))
                            <div class="invalid-feedback">
                                {{ $errors->first('remember') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn-bold btn-red btn-block">
                           Login
                        </button>
                    </div>
                    <div class="text-right">
                        <small>
                            <a class="link-default" href="{{ route('password.request') }}">@lang('Forgot the password?')</a>
                        </small>
                    </div>
                </form>
                <div class="text-center text-muted mb-4">
                    <span>@lang('OR')</span>
                </div>
                @include('pages/login/social')
                <div class="py-3 mt-4 border-top text-center">
                    <p><small>@lang('Don\'t have an account yet?') <a href="{{ route('register') }}">@lang('Join our Membership')</a></small></p>
                </div>
            </article>
        </div>
    </div>
</section>