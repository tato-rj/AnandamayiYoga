@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'Create a routine',
])
@slot('subtitle')
<a href="/office/routines/pending" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all pending requests</a>
@endslot
@endcomponent

@component('admin/pages/routines/request', ['request' => $request])
@endcomponent

<div class="container-fluid border-top pt-4" id="weeks-accordion">

	@component('admin/pages/routines/weeks', [
		'isNew' => true,
		'request' => $request,
		'lessons' => $lessons
	])
	@endcomponent

	<form method="POST" action="/office/routines" enctype="multipart/form-data">
	  {{csrf_field()}}
	  	<input type="hidden" name="schedule">
	  	<input type="hidden" name="user_id" value="{{$request->user->id}}">
	  	<input type="hidden" name="request_id" value="{{$request->id}}">
		<div class="row mt-4">
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
				<div class="form-group">
					<label><small><strong>Comments</strong></small></label>
					<textarea rows="3" class="form-control" name="comment" placeholder="Write here any comments or special instructions (optional)"></textarea>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<label><small><strong>Personalized video</strong></small></label>
				@include('admin/components/uploads/video-add')
			</div>
			<div class="col-12 mt-4">
				
				@include('components/buttons/spinner', [
					'classes' => 'btn btn-red btn-block block-screen-button',
					'label' => 'All set! Click here to submit the routine'])
				
			</div>	
		</div>
	</form>
</div>
@endsection

@section('scripts')
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