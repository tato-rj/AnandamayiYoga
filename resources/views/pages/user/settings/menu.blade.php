<div class="col-lg-3 col-md-3 col-sm-3 col-xs/12 mx-auto mb-5">
	<ul class="p-0 list-style-none">

		<small class="text-muted">Account</small>
		<a href="{{route('user.settings.profile')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.profile')}}">Profile</li>
		</a>
		<a href="{{route('user.settings.preferences')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.preferences')}}">Preferences
				@include('components/snippets/yellow-dot', ['condition' => !auth()->user()->hasPreferencesSelected()])
			</li>
		</a>
		<a href="{{route('user.settings.notifications')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.notifications')}}">Email Notifications</li>
		</a>
		<a href="{{route('user.settings.remove')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.remove')}}">Remove Account</li>
		</a>

		<small class="text-muted">Billing</small>
		<a href="{{route('user.settings.membership')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.membership')}}">Membership

				@include('components/snippets/yellow-dot', ['condition' => ! auth()->user()->membership && auth()->user()->isOnTrial()])

			</li>
		</a>
		<a href="{{route('user.settings.payment')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.payment')}}">Payment Information</li>
		</a>
		<a href="{{route('user.settings.invoices')}}" class="link-dark">
			<li class="mb-2 ml-3 {{highlight('user.settings.invoices')}}">Invoices</li>
		</a>
	</ul>
</div>