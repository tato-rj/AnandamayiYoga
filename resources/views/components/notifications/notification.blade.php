<div class="dropdown-divider m-0"></div>

<a href="{{$notification->data['url'] ?? null}}" class="notifications-item t-2 d-block" data-guard="{{$guard ?? null}}" data-id="{{$notification->id}}">
  <div class="d-flex align-items-center h-100">
    {{-- IMAGE --}}
    <div style="width: 20%; height: 54px">
      <div class="bg-full rounded h-100" style="background-image:url({{
        ($notification->data['type'] == 'user') ? $notification->data['image'] : cloud($notification->data['image'])
      }})"></div>
    </div>
    {{-- TEXT --}}
    <div class="ml-2" style="width: 80%">
      <small class="clamp-2">{{$notification->data['message']}}</small>
      <small class="text-muted d-block">{{$notification->created_at->diffForHumans()}}</small>
    </div>         
  </div>
</a>