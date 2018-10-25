@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Subscriptions',
  'subtitle' => 'Manage all subscriptions lists'])

<div class="row">
  <div class="col-12 my-3 text-center">
    <form method="GET" action="{{url()->current()}}">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        @foreach($lists as $list)
        <label class="btn btn-light {{$currentList == $list ? 'active' : null}}">
          <input type="radio" name="list" value="{{$list}}" {{$currentList == $list ? 'checked' : null}} onchange="this.form.submit()">{{ucfirst($list)}}
        </label>
        @endforeach
      </div>
    </form>
  </div>

  @if(isset($currentList))
    <div class="col-12">
      <p>We have <strong>{{$subscriptions->count()}}</strong> {{str_plural('email', $subscriptions->count())}} in this list.</p>

      @if(! $subscriptions->isEmpty())
      <div>
        <div class="d-flex justify-content-between px-2">
          <div>
            <span><strong>Email</strong></span>
          </div>
          <div>
            <span><strong>Added on</strong></span>
          </div>
        </div>

        @foreach($subscriptions as $subscription)
        <a href="{{route('admin.subscriptions.edit', $subscription->id)}}" class="link-none">
          <div class="d-flex justify-content-between border-bottom cursor-pointer hover-background-light">
            <div class="p-2">
              <span><small>{{$subscription->email}}</small></span>
            </div>
            <div class="p-2">
              <span><small>{{$subscription->created_at->toFormattedDateString()}}</small></span>
            </div>
          </div>
        </a>
        @endforeach

      </div>
      @endif
    </div>
  @endif
</div>

@endsection

@section('scripts')

@endsection