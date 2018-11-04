@component('admin/components/modals/add', ['title' => 'Create a new Asana Type'])
    <form method="POST" action="{{route('admin.asanas.types.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        @input(['required' => true, 'lang' => 'en', 'name' => 'name', 'label' => 'Type name', 'value' => old('name')])
        @input(['required' => false, 'lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome do tipo', 'value' => old('name_pt')])
      </div>
      <div class="text-right">
        <button type="submit" class="btn-bold btn-red btn-xs">Save</button>
      </div>
    </form>
@endcomponent