<div class="subscription-overlay position-fixed w-100 h-100vh" style="z-index: 100000; display: none; background: rgba(255,255,255,0.96)">
	<div style="position: absolute; top: 6%; right: 6%; width: 2em" class="close-overlay">
		<img src="{{cloud('app/misc/close-thin-dark.svg')}}" class="w-100 cursor-pointer">
	</div>
	<div class="row h-100 align-items-center justify-content-center">
		<form method="POST" action="{{route('subscriptions.store', 'newsletter')}}" class="col-lg-4 col-md-6 col-sm-8 col-10 mx-auto text-center" style="border-color: white">
			{{csrf_field()}}
			<h1>@lang('Join our Newsletter')!</h1>
			<p class="lead px-5">@lang('Subscribe now to receive news and updates about our site.')</p>
			<input type="email" name="subscription_email" placeholder="E-mail" class="mb-4 form-control rounded-0 d-block" required style="border: 0; border-bottom: 1px solid lightgrey; background: transparent;">
			<button type="submit" class="btn-bold btn-block btn-red">@lang('Subscribe me')</button>
			<div class="mt-4 text-muted">
				<small>@lang('When you give us your contact info, you will receive our monthly newsletter and info about our programs and classes. You can opt out from out list at any time, by just clicking on the link located at the end of each email.')</small>
			</div>
		</form>
	</div>
</div>