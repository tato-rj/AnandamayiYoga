@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Blog topics'])
  @slot('subtitle')
    <a href="{{route('admin.articles.blog')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all blog posts</a>
  @endslot
@endcomponent

<div class="row">
  <form method="POST" id="create-article" class="form-inline" action="{{route('admin.articles.topics.store')}}">
    {{csrf_field()}}
	<div class="form-group mr-2">
		<input type="text" name="name" size="35" class="form-control" placeholder="Create a new topic">
	</div>
	<button type="submit" class="btn-bold btn-red">Save</button>
  </form>
</div>

<div class="row my-4">
	@foreach($topics as $topic)
	<div class="form-group edit-control m-2" id="name-{{$topic->id}}" name="name">

		<div>
			{{-- DELETE BUTTON --}}
            <i class="fas text-danger fa-trash-alt mr-1 cursor-pointer delete" data-path="/admin/articles/topics/{{$topic->slug}}" data-toggle="modal" data-target="#delete-confirm"></i>
			{{-- EDIT BUTTON --}}
			<i class="fas fa-edit cursor-pointer text-warning edit" data-id="name-{{$topic->id}}"></i>
			{{-- SAVE BUTTON --}}
			<span class="badge badge-success save cursor-pointer"
			  data-id="name-{{$topic->id}}" 
			  data-path="{{route('admin.articles.topics.update', $topic->id)}}"
			  style="display: none; line-height: 1.2; border-bottom: 2px solid green;">
			save</span>
			{{-- LOADING BUTTON --}}
			<span class="badge badge-success border-0 loading" style="display: none; line-height: 1.2; opacity: 0.5">saving</span>
		</div>

		<input type="text" disabled class="form-control-sm form-control mt-1" value="{{$topic->name}}" name="name">

	</div>
	@endforeach
</div>

@component('admin/components/modals/delete', [
  'title' => 'Delete topic'
])
Are you sure you want to delete this topic?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/modal.delete.js')}}"></script>

<script type="text/javascript">
checkName('articles');
</script>

@endsection