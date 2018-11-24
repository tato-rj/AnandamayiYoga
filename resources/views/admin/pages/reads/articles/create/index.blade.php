@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Create a new article'])
  @slot('subtitle')
    <a href="{{route('admin.reads.articles.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent

<div class="row">
  <form method="POST" id="create-article" class="p-4 row w-100" action="{{route('admin.reads.articles.store')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    
    @include('admin/pages/reads/articles/create/left-column')
    
    @include('admin/pages/reads/articles/create/right-column')

  </form>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
checkName('articles');
</script>

<script type="text/javascript">
$('#pin i').on('click', function() {
	$value = $('input[name="is_pinned"]').val();
	$(this).toggleClass('text-blue');
	$('input[name="is_pinned"]').val($value == 1 ? 0 : 1);
});
</script>
@endsection