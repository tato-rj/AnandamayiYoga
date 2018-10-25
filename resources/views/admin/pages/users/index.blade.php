@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Users'])

@slot('subtitle')
<div class="d-flex justify-content-between align-items-baseline"> 
	Showing {{$users->firstItem()}}-{{$users->lastItem()}} of a total of {{$users->total()}} users
	@include('components/filters/options/users')
</div>
@endslot

@endcomponent
<div class="row">

  @forelse($users as $user)
  
    @include('admin/components/cards/user')
  
  @empty

  	@include('components/filters/empty')

  @endforelse

</div>
{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $users->links() }}    
    </div>
</div>

@endsection
