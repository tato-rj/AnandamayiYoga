@component('admin/components/modals/add', ['title' => 'Create a new Asana Sub Type'])
    <form method="POST" action="/admin/asana-subtypes">
      {{csrf_field()}}
      <div class="form-group">
        <input required type="text" class="form-control" name="name" placeholder="Sub Type Name">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-red btn-xs">Save</button>
      </div>
    </form>
@endcomponent