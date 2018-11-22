@extends('layouts/raw')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center h-100vh">
        <div class="col-lg-3 col-md-4 col-sm-8 col-xs-10 mx-auto text-center">
            <div class="d-flex align-items-end mb-4">
                <img src="{{cloud('app/brand/logo-pink.svg')}}" style="width: 20%; min-width: 45px; max-width: 90px">
                <h3 class="text-red ml-2 mb-0">Login<span class="lead text-muted">ADMIN</span></h3>
            </div>
            <form method="POST" action="{{ route('admin.login.submit') }}">
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
                                <small>Remember me</small>
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-red mt-4">Continue</button>
            </form>
        </div>
    </div>
@endsection
