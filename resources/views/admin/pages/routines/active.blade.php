@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'Active Routines'
])
@slot('subtitle')
	@if(count($routines))
	Showing {{$routines->firstItem()}}-{{$routines->lastItem()}} of a total of {{$routines->total()}} routines
	@else
	There are no routines to show
	@endif
@endslot
@endcomponent
<div class="row">
	<div class="col-12">
		<ul class="list-group">
			<div class="accordion" id="accordion">
			@foreach($routines as $routine)
			  <div class="card">
			    <div class="card-header bg-light d-flex justify-content-between" id="headingOne">
					<p class="m-0 text-muted cursor-pointer" data-toggle="collapse" data-target="#routine-{{$routine->id}}">
						<i class="fas fa-eye text-red mr-2"></i>
						<strong>Routine for {{$routine->user->fullName}}</strong>, created on <span class="text-red">{{$routine->created_at->toFormattedDateString()}}</span>
					</p>
					<div class="text-right">
						<a href="{{route('admin.routines.edit', $routine->id)}}"><i class="fas fa-edit mx-1 cursor-pointer text-warning edit"></i></a>
						<i class="fas text-danger fa-trash-alt mx-2 cursor-pointer delete" data-id="{{$routine->id}}" data-toggle="modal" data-target="#delete-confirm"></i>
					</div>
			    </div>

			    <div id="routine-{{$routine->id}}" class="collapse" data-parent="#accordion">
			      <div class="card-body bg-white p-1">
					@component('components/schedule/summary', ['user' => $routine->user])
					@endcomponent
			      </div>
			    </div>
			  </div>
			@endforeach
			</div>
		</ul>
	</div>
</div>
{{-- PAGINATION --}}
<div class="row mt-4">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $routines->links() }}    
    </div>
</div>

@component('admin/components/modals/delete', [
  'title' => 'Delete routine'
])
Are you sure you want to delete this routine?
@endcomponent
@endsection

@section('scripts')
<script type="text/javascript">

$('.delete').on('click', function () {
  $id = $(this).attr('data-id');

  $('#delete-confirm').find('form').attr('action', '/office/routines/'+$id);
});

</script>
@endsection