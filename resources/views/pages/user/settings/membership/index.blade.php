@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/settings/membership/content')
    @include('components/bars/info')
</div>
@endsection

@section('scripts')
@endsection