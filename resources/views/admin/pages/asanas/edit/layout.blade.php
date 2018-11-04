@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Edit Asana'])

  @slot('subtitle')
    <a href="/admin/asanas" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all asanas</a>
  @endslot

@endcomponent

<div class="row">
  <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
    <div>
      <div class="row">

        @include('admin/pages/asanas/edit/left-column')

        @include('admin/pages/asanas/edit/right-column')

      </div>      
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>

<script src="{{asset('js/upload.image.js')}}"></script>

<script type="text/javascript">
$('button.add-field').on('click', function() {
  $button = $(this);
  
  $clone = $button.siblings('.original-type').clone();
  
  $clone.find('input').each(function() {
    $(this).attr('name', $(this).attr('data-name')).removeAttr('disabled');
  });
  
  $clone.removeClass('original-type').insertBefore($button).addClass('d-flex');
});
</script>
@endsection