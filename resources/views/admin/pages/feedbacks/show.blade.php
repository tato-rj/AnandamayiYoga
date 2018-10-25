@extends('admin/layouts/app')

@section('content')

@component('admin/components/page-title', ['title' => 'Feedbacks'])
  @slot('subtitle')
    <a href="{{route('admin.feedbacks.index')}}" class="link-blue"><i class="fas mr-2 fa-long-arrow-alt-left"></i>Return to view all feedbacks</a>
  @endslot
@endcomponent

<div class="row">
  <div class="col-4 mb-4">
    <ul class="list-style-none p-0">
      @if($feedback->target_type)
      <li class="mb-2"><span class="text-muted"><i class="far fa-compass mr-2"></i></span>{{classToString($feedback->target_type).' - '.$feedback->model()->name}}</li>
      <li class="mb-2 d-flex align-items-center">
        <span class="text-muted"><i class="far fa-comments mr-2"></i></span>
        @if($feedback->target_type == 'App\Lesson')
        <i class="text-{{$feedback->score == 5 ? 'success' : 'danger'}} far fa-thumbs-{{$feedback->score == 5 ? 'up' : 'down'}}"></i>
        @else
        @include('components/icons/stars', [
                'score' => $feedback->score,
                'size' => 'sm',
                'margin' => '1'])
        @endif
      </li>
      @else
      <li class="mb-2"><i class="fas fa-laptop mr-2 text-muted"></i><a href="{{$feedback->page}}" target="_blank" class="link-blue">{{$feedback->page}}</a></li>
      <li class="mb-2 d-flex align-items-center">
        <span class="text-muted"><i class="far fa-comments mr-2"></i></span>
        @if($feedback->about == 'page')
        <i class="text-{{$feedback->score == 5 ? 'success' : 'danger'}} far fa-thumbs-{{$feedback->score == 5 ? 'up' : 'down'}}"></i>
        @else
        @include('components/icons/stars', [
                'score' => $feedback->score,
                'size' => 'sm',
                'margin' => '1'])
        @endif
      </li>
      @endif

      <li class="mb-2"><span class="text-muted"><i class="far fa-envelope mr-2"></i></span>{{$feedback->email ?? 'Anonymous feedback'}}</li>
      <li class="mb-2"><span class="text-muted"><i class="far fa-calendar-alt mr-2"></i></span>Created on {{$feedback->created_at->toFormattedDateString()}}</li>
      <li class="mb-2"><span class="text-muted"><i class="far fa-address-card mr-1"></i></span>
        @if(! $feedback->user())
        <span class="text-muted">Not a member</span>
        @elseif($feedback->user()->isOnTrial())
        <a href="{{route('admin.users.show', $feedback->user()->id)}}" class="text-warning link-inherit">On trial period</a>
        @elseif($feedback->user()->hasMembership())
        <a href="{{route('admin.users.show', $feedback->user()->id)}}" class="text-success link-inherit">Active member</a>
        @elseif($feedback->user()->isOnGracePeriod())
        <a href="{{route('admin.users.show', $feedback->user()->id)}}" class="text-warning link-inherit">On grace period</a>
        @else
        <a href="{{route('admin.users.show', $feedback->user()->id)}}" class="text-muted link-inherit">Membership has expired</a>
        @endif
      </li>
    </ul>

    <div class="bg-light rounded px-4 py-3"> 
      @if($feedback->comment)
      <p class="mb-1 pb-1 border-bottom text-muted"><strong>Comment</strong></p>
      <p class="m-0">{{$feedback->comment}}</p>
      @else
      <p class="text-muted m-0">No comment to show</p>
      @endif
    </div>

  </div>
  <div class="col-8">
    <p>What would you like to do?</p>
    @if($feedback->email)
    <div class="mb-2">
      @include('admin/components/email', [
        'email' => $feedback->email,
        'label' => 'Send a reply to this feedback',
        'size' => 'xs',
        'color' => 'blue',
        'font' => 'bold'])
    </div>
    @endif

    <button class="btn-bold btn-xs btn-danger" data-path="{{route('admin.feedbacks.destroy', $feedback->id)}}" data-toggle="modal" data-target="#delete-confirm"><i class="fas fa-trash-alt mr-2"></i>Delete this feedback</button>
  </div>
</div>

@component('admin/components/modals/delete', [
  'title' => 'Delete feedback'
])
Are you sure you want to delete this feedback?
@endcomponent

@endsection

@section('scripts')
<script src="{{asset('js/modal.delete.js')}}"></script>

@endsection