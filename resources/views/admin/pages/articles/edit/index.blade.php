@extends('admin/layouts/app')

@section('header')
<script>
    window.article = <?php echo json_encode([
        'id' => $article->id,
    ]); ?>
</script>
@endsection

@section('content')

@if(request()->has('blog'))
@component('admin/components/page-title', ['title' => 'Edit blog post'])
  @slot('subtitle')
    <a href="{{route('admin.articles.blog')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all posts</a>
  @endslot
@endcomponent
@else
@component('admin/components/page-title', ['title' => 'Edit article'])
  @slot('subtitle')
    <a href="{{route('admin.articles.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent
@endif

<div class="row">
    
    @if(request()->has('blog'))
    @include('admin/pages/articles/edit/left-column')
    @endif
    
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