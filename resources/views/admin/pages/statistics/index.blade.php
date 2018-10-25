@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'Statistics',
  'subtitle' => 'Useful numbers and statistics from the platform'
])
@endcomponent
<div class="row mt-5">
    <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-4">
    	<h4 class="mb-4 text-center"><strong>Flow of users over time</strong></h4>
		<div id="carouselRecords" class="carousel carousel-fade">
			<div class="select-btn-group btn-group btn-group-sm mb-4">
			  <button data-target="#carouselRecords" data-slide-to="0" class="btn btn-blue">Daily</button>
			  <button data-target="#carouselRecords" data-slide-to="1"  class="btn btn-light">Monthly</button>
			  <button data-target="#carouselRecords" data-slide-to="2"  class="btn btn-light">Yearly</button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<canvas id="day-chart" 
							data-records="{{json_encode($dailySignups)}}" 
							data-deleted-records="{{json_encode($dailyDeleted)}}" height="100"></canvas>
				</div>

				<div class="carousel-item">
					<canvas id="month-chart" 
							data-records="{{json_encode($monthlySignups)}}" 
							data-deleted-records="{{json_encode($monthlyDeleted)}}" height="100"></canvas>
				</div>

				<div class="carousel-item">
					<canvas id="year-chart" 
							data-records="{{json_encode($yearlySignups)}}" 
							data-deleted-records="{{json_encode($yearlyDeleted)}}" height="100"></canvas>
				</div>
			</div>
		</div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-8 mx-auto mb-4">
    	<h4 class="mb-4 text-center"><strong>Gender</strong></h4>
    	<div class="">
    		<canvas id="gender-pie" data-records="{{json_encode($gender)}}" height="80" width="80"></canvas>
		</div>
	</div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-8 mx-auto mb-4">
    	<h4 class="mb-4 text-center"><strong>Membership Status</strong></h4>
    	<div class="">
    		<canvas id="status-pie" data-records="{{json_encode($status)}}" height="80" width="80"></canvas>
		</div>
	</div>
	
    <div class="col-lg-4 col-md-6 col-sm-6 col-8 mx-auto mb-4">
    	<h4 class="mb-4 text-center"><strong>Yoga Levels</strong></h4>
    	<div class="">
    		<canvas id="level-pie" data-records="{{json_encode($level)}}" height="80" width="80"></canvas>
		</div>
	</div>
	
    <div class="col-lg-4 col-md-6 col-sm-6 col-8 mx-auto mb-4">
    	<h4 class="mb-4 text-center"><strong>4-week Routine</strong></h4>
    	<div class="">
    		<canvas id="routine-pie" data-records="{{json_encode($routine)}}" height="80" width="80"></canvas>
		</div>
	</div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
var ctxGender = document.getElementById("gender-pie");
var ctxStatus = document.getElementById("status-pie");
var ctxLevel = document.getElementById("level-pie");
var ctxRoutine = document.getElementById("routine-pie");

var colors = {
	grey: '#DAE1E7',
	orange: '#FAAD63',
	yellow: '#FFF382',
	blue: '#6CB2EB',
	green: '#51D88A',
	teal: '#64D5CA',
	purple: '#A779E9',
	pink: '#FA7EA8'
}

var options = {
    legend: {
        position: 'left'
    },
    tooltips: {
		callbacks: {
			label: function(tooltipItem, data) {
				//get the concerned dataset
				var dataset = data.datasets[tooltipItem.datasetIndex];
				//calculate the total of this data set
				var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
					return previousValue + currentValue;
				});
				//get the current items value
				var currentValue = dataset.data[tooltipItem.index];
				//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
				var precentage = Math.floor(((currentValue/total) * 100)+0.5);

				return precentage + "%";
			}
		}
	} 
}

new Chart(ctxGender.getContext('2d'), {
    type: 'pie',
    data: {
		labels: ['Not specified', 'Male', 'Female'],
	    datasets: [{
	        label: 'Points',
	        backgroundColor: [colors.grey, colors.blue, colors.pink],
		    borderColor: 'rgba(255,255,255,0.4)',
	        data: JSON.parse(ctxGender.getAttribute('data-records'))
	    }]
	},
	options: options
});

new Chart(ctxStatus.getContext('2d'), {
    type: 'pie',
    data: {
		labels: ['Unconfirmed', 'On Trial', 'Member', 'Grace Period', 'Inactive'],
	    datasets: [{
	        label: 'Points',
	        backgroundColor: [colors.grey, colors.blue, colors.green, colors.orange, colors.pink],
		    borderColor: 'rgba(255,255,255,0.4)',
	        data: JSON.parse(ctxStatus.getAttribute('data-records'))
	    }]
	},
	options: options
});

new Chart(ctxLevel.getContext('2d'), {
    type: 'pie',
    data: {
		labels: ['Not specified', 'Beginner', 'Intermediate', 'Advanced'],
	    datasets: [{
	        label: 'Points',
	        backgroundColor: [colors.grey, colors.yellow, colors.teal, colors.purple],
		    borderColor: 'rgba(255,255,255,0.4)',
	        data: JSON.parse(ctxLevel.getAttribute('data-records'))
	    }]
	},
	options: options
});

new Chart(ctxRoutine.getContext('2d'), {
    type: 'pie',
    data: {
		labels: ['Has routine', 'No routine'],
	    datasets: [{
	        label: 'Points',
	        backgroundColor: ['#FAAD63', '#DAE1E7'],
		    borderColor: 'rgba(255,255,255,0.4)',
	        data: JSON.parse(ctxRoutine.getAttribute('data-records'))
	    }]
	},
	options: options
});
</script>

<script type="text/javascript">
$('.select-btn-group .btn').on('click', function() {
	$(this).siblings().removeClass('btn-blue').addClass('btn-light');
	$(this).removeClass('btn-light').addClass('btn-blue');
});

createChart('day');
createChart('month');
createChart('year');
</script>

@endsection