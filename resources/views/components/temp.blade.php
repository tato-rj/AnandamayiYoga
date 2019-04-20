<div class="col-lg-5 col-md-6 col-10 mx-auto my-5">

<div class="text-center border px-3 py-4">
	<h5 class="text-red">@lang('Our videos will be available soon!')</h5>
	<p>@lang('Would you like to get a notification when our content is ready?')</p>
	<form method="POST" action="{{route('notify')}}">
		@csrf
		<div class="form-group">
			<input type="email" name="notify_email" required placeholder="Email" class="form-control">
		</div>
		<button class="btn btn-red btn-block">@lang('Yes, let me know!')</button>
	</form>
</div>

</div>