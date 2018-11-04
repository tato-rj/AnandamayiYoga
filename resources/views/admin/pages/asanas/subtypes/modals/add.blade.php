@component('admin/components/modals/add', ['title' => 'Create a new Asana Sub Type'])
    <form method="POST" action="{{route('admin.asanas.subtypes.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        @input(['required' => true, 'lang' => 'en', 'name' => 'name', 'label' => 'Sub type name', 'value' => old('name')])
        @input(['required' => false, 'lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome do sub-tipo', 'value' => old('name_pt')])
      </div>
      <div class="text-right">
        <button type="submit" class="btn-bold btn-red btn-xs">Save</button>
      </div>
    </form>
@endcomponent