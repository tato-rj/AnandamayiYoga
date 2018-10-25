<form method="POST" action="{{route('admin.email.send')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group row border-bottom mx-2">
		<label class="col-form-label"><strong>To</strong></label>
		<div class="flex-grow-1 ml-2">
			<input required type="text" name="recipients" placeholder="email@example.com, another@email.com, etc" value="{{$email}}" class="form-control border-0">
		</div>
	</div>
	<div class="form-group row border-bottom mx-2">
		<label class="col-form-label"><strong>From</strong></label>
		<div class="flex-grow-1 ml-2">
			<select required class="form-control border-0 text-muted" name="from">
				<option selected disabled>Choose the mailbox</option>
				@foreach(config('mail.from.mailboxes') as $mailbox)
				<option value="{{$mailbox}}" @old('from', $mailbox) selected @endold>{{$mailbox}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row border-bottom mx-2">
		<label class="col-form-label"><strong>Subject</strong></label>
		<div class="flex-grow-1 ml-2">
			<input required type="text" name="subject" placeholder="Email subject" value="{{old('subject')}}" class="form-control border-0">
		</div>
	</div>
	<div class="form-group row mx-2">
		<label class="col-form-label"><strong>Attachment</strong></label>
		<div class="flex-grow-1 ml-2">
			<input type="file" style="display: none;" name="attachment">
			<p id="attachment-icon" class="m-0 form-control border-0 d-flex align-items-center cursor-pointer">
				<i class="fas fa-paperclip"></i>
				<span id="attachment-info" class="ml-2"><span class="text-muted">Max size: 5mb</span></span>
			</p>
		</div>
	</div>
	<div class="form-group">
<input type="hidden" id="trix-message" name="message" value="{{old('message')}}">
<trix-editor input="trix-message" placeholder="Message" required style="height: 200px"></trix-editor>
	</div>
	<div class="form-group">

	    @include('components/buttons/spinner', [
	    	'classes' => 'btn btn-red block-screen-button',
	    	'label' => 'Send email'])
	      
	</div>
</form>