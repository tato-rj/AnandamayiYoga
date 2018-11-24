@extends('admin/layouts/app')

@section('header')
<script>
    window.article = <?php echo json_encode([
        'id' => $article->id,
    ]); ?>
</script>
@endsection

@section('content')

@component('admin/components/page-title', ['title' => 'Edit the article'])
  @slot('subtitle')
    <a href="{{route('admin.reads.articles.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent

<div class="row">
  
    @include('admin/pages/reads/articles/edit/left-column')
    
    @include('admin/pages/reads/articles/edit/right-column')

</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/trix.files.js')}}"></script>

<script type="text/javascript">
checkName('articles');
</script>
<script type="text/javascript">
$('#pin i').on('click', function() {
	$value = $('input[name="is_pinned"]').val();
	$('input[name="is_pinned"]').val($value == 1 ? 0 : 1);
	$(this).toggleClass('text-blue');
	patch($(this).attr('data-path'), {key: 'is_pinned', value: $('input[name="is_pinned"]').val()}, $showNotification = true);
});
</script>
@endsection