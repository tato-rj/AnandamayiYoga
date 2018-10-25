@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => "{$user->first_name}'s invoices"])

@slot('subtitle')
<a href="/office/users/{{$user->id}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to the user's page</a>
@endslot

@endcomponent

@include('components/invoices/layout')

@endsection
