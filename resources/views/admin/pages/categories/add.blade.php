@component('admin/components/modals/add', ['title' => 'Create a new Category'])
    <form method="POST" action="/office/categories">
      {{csrf_field()}}
      <div class="form-group">
        <input required type="text" class="form-control" name="name" placeholder="Category Name">
      </div>
      <div class="form-group">
        <input required type="text" class="form-control" name="subtitle" placeholder="Subtitle">
      </div>
      <div class="form-group">
        <textarea required type="text" class="form-control" name="description" rows="4" placeholder="Description"></textarea>
      </div>
      <div class="text-right">
        <button type="submit" class="btn-bold btn-red btn-xs">Save</button>
      </div>
    </form>
@endcomponent