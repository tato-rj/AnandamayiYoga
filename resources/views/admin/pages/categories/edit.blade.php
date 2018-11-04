@component('admin/components/modals/edit', ['title' => 'Edit category'])

	@editInput(['name' => 'name', 'label' => 'Name', 'lang' => 'en'])
	@editInput(['name' => 'name_pt', 'label' => 'Nome', 'lang' => 'pt'])

	@editInput(['name' => 'subtitle', 'label' => 'Subtitle', 'lang' => 'en'])
	@editInput(['name' => 'subtitle_pt', 'label' => 'Subtítulo', 'lang' => 'pt'])

	@editTextarea(['name' => 'description', 'label' => 'Subtitle', 'lang' => 'en'])
	@editTextarea(['name' => 'description_pt', 'label' => 'Subtítulo', 'lang' => 'pt'])

@endcomponent