@component('admin/components/page-title', ['title' => 'Notifications'])
@slot('subtitle')
	@if(count($notifications))
	Showing {{$notifications->firstItem()}} - {{$notifications->lastItem()}} of a total of {{$notifications->total()}} notifications
	@else
	There are no notifications to show
	@endif
@endslot
@endcomponent

<div class="container-fluid">
<div class="row my-3">
	<table class="table table-hover table-sm borderless">
		<tbody>
			@foreach($notifications as $notification)
			<tr class="">
				<td class="text-muted"><small>from {{$notification->created_at->toFormattedDateString()}}</small></td>
				<td colspan="2" class="message-{{$notification->id}} {{($notification->read_at) ? 'opacity-4' : null}}">{{$notification->data['message']}}</td>
				<td class=""><small>						
						@if(!$notification->read_at)
							<span class="text-blue cursor-pointer mark-read" data-id="{{$notification->id}}">mark as read</span>
						@else
							<span class="text-blue cursor-pointer mark-unread" data-id="{{$notification->id}}">mark as unread</span>
						@endif
					</small>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row">
      <div class="d-flex align-items-center w-100 justify-content-center my-4">
    {{ $notifications->links() }}    
    </div>
</div>
</div>