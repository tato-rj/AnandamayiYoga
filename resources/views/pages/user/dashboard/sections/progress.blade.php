<div class="d-none d-sm-block">
@component('pages/user/dashboard/sections/layout', ['title' => __('My Progress')])
	@slot('elements')
	<div class="col-12 p-4">
		<canvas class="chartjs" id="myChart" data-records="{{auth()->user()->records()}}" height="80"></canvas>
	</div>
	@endslot
@endcomponent
</div>