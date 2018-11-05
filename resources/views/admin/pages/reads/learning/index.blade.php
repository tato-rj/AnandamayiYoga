@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Learning About Yoga',
  'subtitle' => "We have {$totalCount} ".str_plural('article', $totalCount)." in total"
])

<div class="row mb-4">
  <div class="col-12">
    <a href="{{route('admin.articles.create', 'learning')}}" class="btn-bold btn-red btn-xs">Create a new learning article</a>
  </div>
</div>

<div class="row">
  @foreach($subjects as $subject => $articles)
    @if($articles->count())
      <div class="col-lg-6 col-md-6 col-12 sortable-list" id="{{$subject}}">
        @foreach($articles as $article)
          @include('admin/pages/reads/learning/draggable')
        @endforeach
      </div>
    @endif
  @endforeach
</div>

@component('admin/components/modals/delete', ['title' => 'Delete article'])
Are you sure you want to delete this article?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>
<script src="{{asset('js/sortable.js')}}"></script>
<script type="text/javascript">
$('.sortable-list').each(function() {
  id = $(this).attr('id');
  autoSortable($('#'+id));
});
</script>
@endsection