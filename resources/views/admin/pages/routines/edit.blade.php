@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => "Edit the routine for {$routine->user->fullName}",
])
@slot('subtitle')
<a href="/office/routines/active" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all active requests</a>
@endslot
@endcomponent

<div class="container-fluid" id="weeks-accordion">

	@component('admin/pages/routines/weeks', [
		'isNew' => false,
		'request' => $routine->questionaire,
		'lessons' => $lessons
	])
	@endcomponent

</div>

<div class="row my-4 border-bottom pb-4">
	<div class="col-lg-3 col-md-3 col-sm-4 col-6">
	{{-- VIDEO --}}
	<label class="d-block text-muted"><small>Introduction video</small></label>
	
	@include('admin/components/uploads/video-edit', [
	'video' => $routine->video_path,
	'path' => "/office/routines/{$routine->id}/video"])

	</div>
	<div class="col-lg-9 col-md-3 col-sm-8 col-6">
      {{-- COMMENTS --}}          
      <div class="form-group edit-control" id="comment-{{$routine->id}}" name="comment">

        @include('components/editing/label', [
          'title' => 'Comments',
          'id' => "comment-{$routine->id}",
          'path' => "/office/routines/{$routine->id}"])
    
        <textarea rows="5" disabled class="form-control" placeholder="This program has no comments"></textarea>
      </div>
	</div>
</div>

@include('admin/pages/routines/request', ['request' => $routine->questionaire])

@endsection

@section('scripts')
<script src="{{asset('js/edit.inputs.js')}}"></script>

<script src="{{asset('js/upload.image.js')}}"></script>

<script>
  $("#sortable-all, #sortable-selections").sortable({
    connectWith: ".connectedSortable",
    receive: function(event, element) {
    	$originalContainer = $(element.sender);
    	$element = $(element.item);
    	$input = $element.find('input');

    	if ($originalContainer.attr('id') == 'sortable-all') {
    		$input.attr('name', $element.attr('data-name'));
    		$input.attr('type', 'checkbox');
    	} else {
    		$input.removeAttr('name');
    		$input.removeAttr('type');
    	}

		var schedule = {};

		$('.schedule-container').each(function() {
			$container = $(this);

			var dayObj = {};
			var timeObj = {};

			var day = $container.attr('data-date');
			var time = $container.attr('data-time');
			var lessons = [];

			$container.find('input[name="lessons[]"]').each(function() {
				lessons.push($(this).val());
			});

			dayObj[time] = lessons;
			schedule[day] = dayObj;
    	});
		console.log('New schedule is :'+JSON.stringify(schedule));
		$('input[name="schedule"]').val(JSON.stringify(schedule));
    }
  }).disableSelection();
</script>
@endsection