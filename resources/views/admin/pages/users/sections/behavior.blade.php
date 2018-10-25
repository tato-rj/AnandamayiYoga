@component('admin/pages/users/sections/layout', ['title' => 'Behavior'])

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Favorite Classes</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{count($user->favoriteLessons)}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->favoriteLessons,
      'icon' => 'video'
    ])
    @endcomponent
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Favorite Programs</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{count($user->favoritePrograms)}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->favoritePrograms,
      'icon' => 'table'
    ])
    @endcomponent
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Favorite Asanas</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{count($user->favoriteAsanas)}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->favoriteAsanas,
      'icon' => 'child'
    ])
    @endcomponent
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Classes watched</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{$user->completedLessons()->count()}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->completedLessons,
      'icon' => 'eye'
    ])
    @endcomponent
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Completed Programs</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{$user->completedPrograms()->count()}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->completedPrograms,
      'icon' => 'check'
    ])
    @endcomponent
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
  <div class="text-center">
    <label class="text-muted m-0"><strong>Completed Routines</strong></label>
    <h1 class="text-red mb-1" style="font-size: 4em"><strong>{{$user->completedRoutines()->count()}}</strong></h1>
    @component('admin/pages/users/sections/details', [
      'favorites' => $user->completedRoutines,
      'icon' => 'calendar'
    ])
    @endcomponent
  </div>
</div>

<div class="col-12 mt-4">
  <canvas id="records-chart" data-iteration="14" data-records="{{$user->records(14)}}" height="60"></canvas>
</div>
@endcomponent