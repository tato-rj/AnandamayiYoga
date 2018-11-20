@extends('layouts/app')

@section('content')
<div class="container-fluid">

    @component('components/sections/lead', ['image' => 'anandamayi'])
		@slot('extra')
		<img id="scroll-mark" src="{{cloud('app/images/alice/lead.jpg')}}" class="rounded-circle mb-2 mx-auto d-block lead-profile-image">
		@endslot
	@endcomponent
	
	<div class="container">
		<div class="row mb-7">
			<div class="col-lg-8 col-md-10 col-sm-12 col-12 mx-auto">
				<div class="mb-5 d-flex align-items-center justify-content-center mt-4">
					<a href="https://www.yogaalliance.org/" target="_blank" class="link-none" title="YogaAlliance.org">
						<img src="{{cloud('app/images/alice/alliance.png')}}" class="mr-3 pr-3 border-right" style="width: 90px">
					</a>
					<div>
						<p class="lead mb-0">@lang('Registered Yoga Teacher')</p>
						<p class="m-0"><small><strong>@lang('500-hour Yoga teacher training')</strong></small></p>
					</div>
				</div>
				{!! anandamayi()->biography !!}
			</div>
		</div>
	</div>
	
	@include('components/bars/join', [
		'image' => 'mountain',
		'overlay' => 'blue',
		'title' => 'JOIN US TODAY'])

    @include('components/bars/books')
    
    @include('components/bars/testimonials')
</div>

@endsection
