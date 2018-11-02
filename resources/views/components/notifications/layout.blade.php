<div class="shadow notifications-dropdown dropdown-menu dropdown-menu-right pb-2" aria-labelledby="navbarDropdown">

  <div class="notifications-head text-center">
    <div>
      <small>
        <strong class="text-danger">{{count($notifications)}}</strong> notifications
      </small>
    </div>
    <div>
      <small><a href="{{$guard ?? null}}/notifications" class="link-blue">see all</a></small>
    </div>
  </div>
  
  <div class="notification-box" style="max-height: 380px; overflow-y: auto;">
    @forelse($notifications as $notification)

      @include('components/notifications/notification', ['notification' => $notification])

      @if($loop->last)
        <div class="dropdown-divider m-0"></div>

        <div class="text-center mt-2">
          <form method="POST" action="{{$guard ?? null}}/notifications/mark-read">
            {{csrf_field()}}
            <button type="submit" class="m-0 text-blue bg-transparent border-0 p-0 cursor-pointer"><small>mark all as read</small></button>
          </form>
        </div>
      @endif
    
    @empty

    @include('components/notifications/empty')

    @endforelse
  </div>
  
</div>
