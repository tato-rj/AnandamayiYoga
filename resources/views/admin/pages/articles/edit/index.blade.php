@extends('admin/layouts/app')

@section('header')
<script>
    window.article = <?php echo json_encode([
        'id' => $article->id,
    ]); ?>
</script>
@endsection

@section('content')

@component('admin/components/page-title', ['title' => 'Edit article'])
  @slot('subtitle')
    <a href="/office/articles" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent

<div class="row">
    
    @include('admin/pages/articles/edit/left-column')
    @include('admin/pages/articles/edit/right-column')

</div>

@endsection

@section('scripts')
<script src="{{asset('js/upload.image.js')}}"></script>
<script src="{{asset('js/edit.inputs.js')}}"></script>
<script src="{{asset('js/trix.files.js')}}"></script>

<script type="text/javascript">
checkName('articles');
</script>

@endsection