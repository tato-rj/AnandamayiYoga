@extends('admin/layouts/app')

@section('content')

@include('admin/components/page-title', [
  'title' => 'Routine questionaires', 
  'subtitle' => [
    'label' => "We have {$questionaires->count()} ".str_plural('questionaire', $questionaires->count())." created"
  ]])

<div>
    <ul class="list-group">
      @foreach($questionaires as $questionaire)
      <div class="mb-2">
        <a href="{{route('admin.teachers.questionaire.show', $questionaire->teacher->slug)}}" class="list-group-item list-group-item-action border-0">
            <i class="fas fa-edit mr-2 text-red"></i>Questionaire create by <strong>{{$questionaire->teacher->name}}</strong> on {{$questionaire->created_at->toFormattedDateString()}}
        </a>
      </div>
      @endforeach
  </ul>
</div>

@endsection
