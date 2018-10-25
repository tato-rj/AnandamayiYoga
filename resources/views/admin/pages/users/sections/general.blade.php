@component('admin/pages/users/sections/layout', ['title' => 'General info'])

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="mx-2">
    <label class="m-0"><small><strong>Full name</strong></small></label>
    <p class="mb-1">{{$user->fullName}}</p>
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Email</strong></small></label>
    <p class="mb-1">{{$user->email}}</p>
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Gender</strong></small></label>
    @if ($user->gender)
    <p class="mb-1">{{ucfirst($user->gender)}}</p>
    @else
    <p class="mb-1 text-muted"><small>Nothing to show</small></p>
    @endif
  </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="mx-2">
    <label class="m-0"><small><strong>Yoga level</strong></small></label>
    @if ($user->level)
    <p class="mb-1">{{$user->level->name}}</p>
    @else
    <p class="mb-1 text-muted"><small>Nothing to show</small></p>
    @endif
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Language</strong></small></label>
    <p class="mb-1">{{($user->lang == 'pt') ? 'Portuguese' : 'English'}}</p>
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Timezone</strong></small></label>
    <p class="mb-1">{{$user->timezone}}</p>
  </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="mx-2">
    <label class="m-0"><small><strong>Currency</strong></small></label>
    <p class="mb-1">{{strtoupper($user->currency)}}</p>
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Language</strong></small></label>
    <p class="mb-1">{{($user->lang == 'pt') ? 'Portuguese' : 'English'}}</p>
  </div>
  <div class="mx-2">
    <label class="m-0"><small><strong>Timezone</strong></small></label>
    <p class="mb-1">{{$user->timezone}}</p>
  </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  <div class="mx-2">
    <label class="m-0"><small><strong>Preferred styles</strong></small></label>
    <div>
      @forelse($user->categories as $category)
        <span class="badge badge-light">{{$category->name}}</span>
        @empty
        <p class="mb-1 text-muted"><small>Nothing to show</small></p>
      @endforelse
    </div>
  </div>
</div>
@endcomponent