@component('admin/components/modals/add', ['title' => 'Create a new Category'])
    <form method="POST" action="/admin/categories">
      @csrf
      <div class="form-group">
        @input(['lang' => 'en', 'name' => 'name', 'label' => 'Category name', 'value' => old('name')])
        @input(['lang' => 'pt', 'name' => 'name_pt', 'label' => 'Nome da categoria', 'value' => old('name_pt')])
      </div>
      <div class="form-group">
        @input(['lang' => 'en', 'name' => 'subtitle', 'label' => 'Subtitle', 'value' => old('subtitle')])
        @input(['lang' => 'pt', 'name' => 'subtitle_pt', 'label' => 'Subtítulo', 'value' => old('subtitle_pt')])
      </div>
      <div class="form-group">
        @textarea(['lang' => 'en', 'name' => 'description', 'label' => 'Description', 'value' => old('description')])
        @textarea(['lang' => 'pt', 'name' => 'description_pt', 'label' => 'Descrição', 'value' => old('description_pt')])
      </div>
      <div class="text-right">
        <button type="submit" class="btn-bold btn-red btn-xs">Save</button>
      </div>
    </form>
@endcomponent