@extends('layouts/app')

@section('content')
<div class="container-fluid">
    @include('components/sections/lead', ['image' => 'contact'])
    @include('pages/user/settings/remove/content')
</div>
@endsection
