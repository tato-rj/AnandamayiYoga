@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'register'])
    
    <section id="scroll-mark" class="container py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 mx-auto">
                <div class="panel panel-default text-center">
                    <h4 class="text-muted mb-4"><strong>Did you forget your password?</strong></h4>
                    <p class="mb-4">No problem! For your security, we will send a reset link to your email. After opening that link, you will be able to create a new password.</p>

                    <div class="panel-body">

                        <form method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="email" class="form-control bg-light {{ $errors->has('email') ? 'is-invalid' : 'border-0' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-red btn-block">
                                    Send my password reset link
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
