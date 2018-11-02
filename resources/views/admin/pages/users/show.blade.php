@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => $user->fullName])

@slot('subtitle')
<a href="/admin/users" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all users</a>
@endslot

@endcomponent

<div class="d-flex w-100 align-items-end mb-4">
    <img src="{{$user->avatar()}}" class="rounded mx-2" 
         style="width: 180px;
        @notActive($user)
          filter: grayscale(100);
        @endnotActive
         ">
    <div class="pl-2">
      <p class="text-muted mb-0">{{$user->first_name}} is @include('admin/components/status')
        @trial($user)
        <span class="text-warning"> (ends on {{$user->trial_ends_at->toFormattedDateString()}})</span>
        @endtrial
      </p>
      <p class="text-muted mb-0">Account created on <span class="text-dark">{{$user->created_at->toFormattedDateString()}}</span></p>
      @if($user->last_login_at)
      <p class="text-muted mb-0">Last login was <span class="text-dark">{{$user->last_login_at->diffForHumans()}}</span></p>
      @endif
    </div>
</div>

@include('admin/pages/users/sections/general')

@confirmed($user)
  @include('admin/pages/users/sections/behavior')
  @include('admin/pages/users/sections/purchases')
@endconfirmed

@if($user->hasMembership() || $user->isOnGracePeriod())
  @include('admin/pages/users/sections/membership')
@endif


<div class="text-right mt-5">
  @include('admin/components/email', ['email' => $user->email])

  <button class="btn btn-danger" data-path="/admin/users/{{$user->id}}" data-toggle="modal" data-target="#delete-confirm">
    <i class="fas fa-trash-alt mr-2"></i>Delete user
  </button>
</div>

@component('admin/components/modals/delete', ['title' => 'Delete user'])
Are you sure you want to delete this user?
@endcomponent

@endsection

@section('scripts')
<script type="text/javascript">

$('.delete').on('click', function () {
  $id = $(this).attr('data-id');

  $('#delete-confirm').find('form').attr('action', '/admin/categories/'+$id);
});

</script>

<script type="text/javascript">
var ctx = document.getElementById("records-chart");
var records = JSON.parse(ctx.getAttribute('data-records'));
var iteration = parseInt(ctx.getAttribute('data-iteration'));

var labels = [ 
    "Yesterday", 
    "Today"
];

for (var i = 2; i <= iteration; i++) {
  labels.unshift(
    moment().subtract(i, 'days').format("MMM Do")
  );
}

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Classes watched',
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