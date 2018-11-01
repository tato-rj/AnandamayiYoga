<div class="show-on-scroll text-right z-40" id="help-button" style="position: fixed; bottom: 1.6em; right: 1.6em">
	<div id="help-container" class="bg-white rounded px-4 py-3 shadow text-left mb-4 animated-fast fadeInUp" style="display: none;">
		<p class="text-muted border-bottom mb-1 pb-1"><small><strong>@lang('How can we help?')</strong></small></p>
		<ul class="m-0 p-0 list-style-none">
			<li><small><strong><a href="{{route('support.getting-started')}}" class="link-blue"><i class="fas fa-caret-right mr-2"></i>@lang('Classes')</a></strong></small></li>
			<li><small><strong><a href="{{route('support.courses')}}" class="link-blue"><i class="fas fa-caret-right mr-2"></i>@lang('Courses')</a></strong></small></li>
			<li><small><strong><a href="{{route('support.membership')}}" class="link-blue"><i class="fas fa-caret-right mr-2"></i>@lang('Membership')</a></strong></small></li>
			<li><small><strong><a href="{{route('support.contact.show')}}" class="link-blue"><i class="fas fa-caret-right mr-2"></i>@lang('Get in touch')</a></strong></small></li>
			<li><small><strong><a href="{{route('support.index')}}" class="link-blue"><i class="fas fa-caret-right mr-2"></i>@lang('Other')</a></strong></small></li>
		</ul>
	</div>
	<div class="btn-bold btn-sm btn-blue shadow-dark" style="border-radius: 100px;"><i class="fas fa-question-circle mr-2 d-none d-sm-inline"></i>@lang('Need help?')</div>
</div>