@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Feedbacks',
  'subtitle' => 'Manage all user feedbacks'])

<div class="row">
  <div class="col-12 my-3 text-center">
    <form method="GET" action="{{url()->current()}}">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        @foreach($types as $type)
        <label class="btn btn-light {{$currentType == $type ? 'active' : null}}">
          <input type="radio" name="type" value="{{$type}}" {{$currentType == $type ? 'checked' : null}} onchange="this.form.submit()">{{ucfirst($type)}}
        </label>
        @endforeach
      </div>
    </form>
  </div>

  @include("admin/pages/feedbacks/types/{$currentType}")

</div>

@endsection

@section('scripts')

@endsection