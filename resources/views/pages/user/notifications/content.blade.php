<section id="scroll-mark" class="container py-5">
	<div class="row my-3">
		<h3 class="mb-2"><strong>Notifications</strong></h3>
		<div class="col-12">
			<p class="text-right"><small><a class="link-default" href="{{route('user.settings.notifications')}}">Notifications settings</a></small></p>	
		</div>
		
		<table class="table table-responsive table-hover table-sm borderless border-top">
			<tbody>
				@foreach(auth()->user()->notifications as $notification)
				<tr class="border-bottom">
					<td class="text-muted text-center"><small>from {{$notification->created_at->toFormattedDateString()}}</small></td>
					<td colspan="2" class="message-{{$notification->id}} {{($notification->read_at) ? 'opacity-4' : null}}">{{$notification->data['message']}}</td>
					<td class="text-center"><small>						
							@if(!$notification->read_at)
								<span class="text-blue cursor-pointer mark-read" data-id="{{$notification->id}}">mark as read</span>
							@else
								<span class="text-blue cursor-pointer mark-unread" data-id="{{$notification->id}}">mark as unread</span>
							@endif
						</small></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>