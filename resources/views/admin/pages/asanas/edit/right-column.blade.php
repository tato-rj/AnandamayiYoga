<div class="col-8">
  <div class="form-group">
    @include('admin.components.input-lang')
  </div>

  @editInput([
    'name' => 'sanskrit', 
    'label' => 'The name in sanskrit of this asana is', 
    'lang' => null, 
    'id' => "sanskrit-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->sanskrit
    ])

  @editInput([
    'name' => 'name', 
    'label' => 'The english name of this asana is', 
    'lang' => 'en', 
    'id' => "name-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->name
    ])

  @editInput([
    'name' => 'name_pt', 
    'label' => 'O nome em portugês é', 
    'lang' => 'pt', 
    'id' => "name_pt-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->name_pt
    ])

  @editInput([
    'name' => 'also_known_as', 
    'label' => 'This asana is also known as', 
    'lang' => 'en', 
    'id' => "also_known_as-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->also_known_as
    ])

  @editInput([
    'name' => 'also_known_as_pt', 
    'label' => 'Esse asana também é conhecido como', 
    'lang' => 'pt', 
    'id' => "also_known_as_pt-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->also_known_as_pt
    ])

  @editInput([
    'name' => 'etymology', 
    'label' => 'The etymology of this asana is', 
    'lang' => 'en', 
    'id' => "etymology-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->etymology
    ])

  @editInput([
    'name' => 'etymology_pt', 
    'label' => 'A etimologia desse asana é', 
    'lang' => 'pt', 
    'id' => "etymology_pt-{$asana->id}", 
    'path' => "/admin/asanas/{$asana->id}",
    'value' => $asana->etymology_pt
    ])

  {{-- BENEFITS --}}          
  <div class="form-group edit-control" id="benefits-{{$asana->id}}" name="benefits[]">

    @include('components.form.edit.label', [
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

    @include('components.form.edit.label', [
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
    @include('components.form.edit.label', [
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

    @include('components.form.edit.label', [
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

    @include('components.form.edit.label', [
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