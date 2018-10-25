@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', [
  'title' => 'Dashboard',
  'subtitle' => 'Here is where we\'ll manage the back-end and track user data for the platform'
])
@endcomponent

@include('admin/pages/dashboard/highlights')

<div class="row mt-2">
    <div class="col-md-8">
        @include('admin/pages/dashboard/memberships')
    </div>

    <div class="col-md-4">
        @include('admin/pages/dashboard/signups')
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
var glanceChart = document.getElementById("glance-chart");
var ctx = glanceChart.getContext('2d');
var counts = JSON.parse(glanceChart.getAttribute('data-counts'));

var months = [
            moment().subtract(5, 'months').format("M"), 
            moment().subtract(4, 'months').format("M"), 
            moment().subtract(3, 'months').format("M"), 
            moment().subtract(2, 'months').format("M"), 
            moment().subtract(1, 'months').format("M"), 
            moment().subtract(0, 'months').format("M"),
        ];
var data = [];

months.forEach(function(month, index) {
    if (typeof counts[month] === 'undefined') {
        data.push(0);
    } else {
        data.push(counts[index]);
    }
});

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            moment().subtract(5, 'months').format("MMMM"), 
            moment().subtract(4, 'months').format("MMMM"), 
            moment().subtract(3, 'months').format("MMMM"), 
            moment().subtract(2, 'months').format("MMMM"), 
            moment().subtract(1, 'months').format("MMMM"), 
            moment().subtract(0, 'months').format("MMMM"),
        ],
        datasets: [{
            label: 'New memberships',
            data: data,
            pointBackgroundColor: 'rgba(255, 99, 132, 0.2)',
            pointBorderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
            callbacks: {
                labelColor: function(tooltipItem, chart) {
                    return {
                        borderColor: 'rgb(255,99,132,1)',
                        backgroundColor: 'rgb(255, 99, 132, 0.2)'
                    }
                }
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    beginAtZero: true,
                    callback: function(value, index, values) {
                        if (Math.floor(value) === value) {
                            return value;
                        }
                    }
                }
            }]
        }
    }
});
</script>
@endsection