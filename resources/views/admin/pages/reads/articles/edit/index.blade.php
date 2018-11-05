@extends('admin/layouts/app')

@section('header')
<script>
    window.article = <?php echo json_encode([
        'id' => $article->id,
    ]); ?>
</script>
@endsection

@section('content')

@component('admin/components/page-title', ['title' => 'Create a new article'])
  @slot('subtitle')
    <a href="{{$article->isBlog ? 
              route('admin.articles.learning') : 
              route('admin.articles.articles')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all articles</a>
  @endslot
@endcomponent

<div class="row">
    
    @if(! $article->isBlog)
    @include('admin/pages/reads/articles/edit/left-column')
    @endif
    
    @include('admin/pages/reads/articles/edit/right-column')

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