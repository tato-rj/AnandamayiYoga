<div class="col-8">
  {{-- SANSKRIT --}}          
  <div class="form-group edit-control" id="sanskrit-{{$asana->id}}" name="sanskrit">

    @include('components/editing/label', [
      'title' => 'The name in sanskrit of this asana is',
      'id' => "sanskrit-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$asana->sanskrit}}" name="sanskrit">

  </div>

  {{-- NAME --}}          
  <div class="form-group edit-control" id="name-{{$asana->id}}" name="name">

    @include('components/editing/label', [
      'title' => 'The english name of this asana is',
      'id' => "name-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$asana->name}}" name="name">

  </div>

  {{-- ALSO KNOWN AS --}}          
  <div class="form-group edit-control" id="also_known_as-{{$asana->id}}" name="also_known_as">

    @include('components/editing/label', [
      'title' => 'This asana is also known as',
      'id' => "also_known_as-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$asana->also_known_as}}" name="also_known_as">

  </div>

  {{-- ETYMOLOGY --}}          
  <div class="form-group edit-control" id="etymology-{{$asana->id}}" name="etymology">

    @include('components/editing/label', [
      'title' => 'The etymology of this asana is',
      'id' => "etymology-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}"
    ])
    
    <input type="text" disabled class="form-control" value="{{$asana->etymology}}" name="etymology">

  </div>

  {{-- BENEFITS --}}          
  <div class="form-group edit-control" id="benefits-{{$asana->id}}" name="benefits[]">

    @include('components/editing/label', [
      'title' => 'The benefits of this asana are',
      'id' => "benefits-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}/benefits"
    ])

    @include('admin/components/multitype/layout', [
      'collection' => $asana->benefits,
      'type' => 'benefit'
    ])

  </div>

  {{-- STEPS --}}          
  <div class="form-group edit-control" id="steps-{{$asana->id}}" name="steps[]">

    @include('components/editing/label', [
      'title' => 'The steps of this asana are',
      'id' => "steps-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}/steps"
    ])

    @include('admin/components/multitype/layout', [
      'collection' => $asana->steps,
      'type' => 'step'
    ])

  </div>
  
  {{-- LEVELS --}}
  <div class="form-group edit-control" id="levels-{{$asana->id}}" name="levels">
    @include('components/editing/label', [
      'title' => 'For those who are',
      'id' => "levels-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}/levels"
    ])

    @foreach($levels as $level)
    <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
      <input class="custom-control-input" 
        disabled
        name="levels[]" 
        type="checkbox" 
        id="level-{{$level->id}}" 
        value="{{$level->id}}"
        @exists($asana->levels()->pluck('id'), $level->id) checked @endexists>
      <label class="mb-2 custom-control-label text-muted" for="level-{{$level->id}}">{{$level->name}}</label>
    </div>
    @endforeach
  </div>

  {{-- TYPES --}}
  <div class="form-group edit-control" id="type-{{$asana->id}}" name="types">

    @include('components/editing/label', [
      'title' => 'Asana\'s types',
      'id' => "type-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}/types"
    ])
    
    @foreach($asanaTypes as $type)
    <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
      <input class="custom-control-input" 
        disabled 
        name="types[]" 
        type="checkbox" 
        id="type-{{$type->id}}" 
        value="{{$type->id}}"
        @exists($asana->typesIds(), $type->id) checked @endexists>
      <label class="mb-2 custom-control-label text-muted" for="type-{{$type->id}}">{{$type->name}}</label>
    </div>
    @endforeach

  </div>

  {{-- SUBTYPES --}}
  <div class="form-group edit-control" id="subtype-{{$asana->id}}" name="subtypes">

    @include('components/editing/label', [
      'title' => 'Asana\'s subtypes',
      'id' => "subtype-{$asana->id}",
      'path' => "/admin/asanas/{$asana->id}/subtypes"
    ])
    
    @foreach($asanaSubtypes as $subtype)
    <div class="form-check custom-control custom-checkbox text-nowrap d-inline m-2">
      <input class="custom-control-input" 
        disabled 
        name="subtypes[]" 
        type="checkbox" 
        id="subtype-{{$subtype->id}}" 
        value="{{$subtype->id}}"
        @exists($asana->subtypesIds(), $subtype->id) checked @endexists>
      <label class="mb-2 custom-control-label text-muted" for="subtype-{{$subtype->id}}">{{$subtype->name}}</label>
    </div>
    @endforeach
  </div>
</div>