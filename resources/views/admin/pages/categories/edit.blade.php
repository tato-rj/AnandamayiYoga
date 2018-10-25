@component('admin/components/modals/edit', ['title' => 'Edit category'])

<div class="form-group edit-control" id="" name="name">
	@component('components/editing/label', [
		'title' => 'Name',
		'id' => "",
		'path' => ""
		])
	@endcomponent

	<input type="text" disabled class="form-control" value="" name="name">
</div>

<div class="form-group edit-control" id="" name="subtitle">
	@component('components/editing/label', [
		'title' => 'Subtitle',
		'id' => "",
		'path' => ""
		])
	@endcomponent

	<input type="text" disabled class="form-control" value="" name="subtitle">
</div>

<div class="form-group edit-control" id="" name="description">
	@component('components/editing/label', [
		'title' => 'Description',
		'id' => "",
		'path' => ""
		])
	@endcomponent

	<textarea disabled class="form-control" name="description" rows="5"></textarea>
</div>

@endcomponent