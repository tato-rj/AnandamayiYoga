@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'New Requests'
])
@slot('subtitle')
	@if(count($pendingRequests))
	Showing {{$pendingRequests->firstItem()}}-{{$pendingRequests->lastItem()}} of a total of {{$pendingRequests->total()}} requests
	@else
	There are no requests to show
	@endif
@endslot
@endcomponent
<div class="row">
	<div class="col-12">
		<ul class="list-group">
			@foreach($pendingRequests as $request)
			<a href="{{route('admin.routines.create', ['request' => $request])}}" class="list-group-item list-group-item-action border-0">
				<p class="m-0 text-muted">
					<i class="fas fa-magic text-blue mr-2"></i>
					<strong>{{$request->user->fullName}}</strong> made a request <span class="text-red">{{$request->created_at->diffForHumans()}}</span>
				</p>
			</a>
			@endforeach
		</ul>
	</div>
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $pendingRequests->links() }}    
    </div>
</div>

@endsection
