@extends('layouts/app')

@section('content')

<div class="container-fluid">
    @include('pages/user/dashboard/lead')
    
    @if(auth()->user()->isActive())
        @include('pages/user/dashboard/content')
    @else
        @include('pages/user/dashboard/inactive')
    @endif

</div>

@endsection

@section('scripts')

<script type="text/javascript">

$('#welcome').modal('show');

$('.carousel').carousel({
  interval: false
});

$('.carousel-indicators .bullets').on('click', function() {
    $(this).addClass('active').siblings().removeClass('active');
});

$('.carousel-next').on('click', function() {
    $('.carousel').carousel('next');
});

$('#welcome-carousel').on('slide.bs.carousel', function (e) {
    $index = $('.carousel-item').index($('.active'));

    if ($index == 1) {
        $('.carousel-next').removeClass('btn-outline-red').addClass('btn-red').find('strong').text('Let\'s Start!');
    }

    if ($index == 2) {
        $('.carousel-next').attr('data-dismiss', 'modal');
    }
});

$('#welcome-carousel').on('slid.bs.carousel', function (e) {
    $index = $('.carousel-item').index($('.active'));

    $('.carousel-indicators .bullets').removeClass('active');

    $('.carousel-indicators .bullets[data-slide-to="'+$index+'"]').addClass('active');
});

$('#welcome').on('hidden.bs.modal', function (e) {
  $.ajax({
    url: "/login/record",
    method: "POST"
  }).done(function() {
    console.log('First login recorded.');
  });
})

$('#resume-membership .btn').on('click', function() {
    $button = $(this);

    updateButton(
        $button, 
        disabled = true, 
        'We\'ll be right back...'
    );
})
</script>

<script>

var ctx = document.getElementById("myChart");
var records = JSON.parse(ctx.getAttribute('data-records'));

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            moment().locale('pt').subtract(5, 'days').format("MMM D"), 
            moment().locale('pt').subtract(4, 'days').format("MMM D"), 
            moment().locale('pt').subtract(3, 'days').format("MMM D"), 
            moment().locale('pt').subtract(2, 'days').format("MMM D"), 
            app.locale.yesterday, 
            app.locale.today
        ],
        datasets: [{
            label: app.locale.chart_label,
            data: records,
            pointBackgroundColor: 'rgba(255, 99, 132, 0.2)',
            pointBorderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }]
    },
    options: {
        showLines: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    stepSize: 1
                }
            }]
        }
    }
});
</script>

@endsection