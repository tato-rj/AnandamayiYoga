@component('admin/components/modals/edit', ['title' => 'Edit Sub Type'])

<div class="form-group edit-control" id="" name="name">
	@include('components/editing/label', [
		'title' => 'Name',
		'id' => "",
		'path' => ""])

	<input type="text" disabled class="form-control" value="" name="name">
</div>

<div class="form-group edit-control" id="" name="description">
	@include('components/editing/label', [
		'title' => 'Description',
		'id' => "",
		'path' => ""])

	<textarea disabled class="form-control" name="description" rows="5"></textarea>
</div>

@endcomponent