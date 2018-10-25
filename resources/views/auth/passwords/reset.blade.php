@extends('layouts/app')

@section('content')

<div class="container-fluid">

    @include('pages/register/lead')

    <section id="scroll-mark" class="container py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 mx-auto">
                <div class="panel panel-default text-center">
                    <h4 class="mb-5"><strong>Reset your password here</strong></h4>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <input type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

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

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-red btn-block">
                                    Reset my password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
