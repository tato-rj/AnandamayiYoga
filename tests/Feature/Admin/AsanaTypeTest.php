<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class AsanaTypeTest extends AppTest
{
	/** @test */
	public function a_admin_can_create_a_new_asana_type()
	{
		$this->adminSignIn();

		$type = make('App\AsanaType');

		$this->post(route('admin.asanas.types.store', $type->toArray()))
			 ->assertSessionHas('status');

		$this->assertDatabaseHas('asana_types', [
			'name' => $type->name
		]);
	}

	/** @test */
	public function the_same_asana_type_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$type = make('App\AsanaType');

		$this->post(route('admin.asanas.types.store', $type->toArray()))
			 ->assertSessionHas('status');

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post('/admin/asana-types', $type->toArray());
	}

	/** @test */
	public function a_admin_can_edit_an_asana_type()
	{
		$this->adminSignIn();

		$type = create('App\AsanaType');
		
		$this->json('PATCH', route('admin.asanas.types.update', $type->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('asana_types', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function a_admin_can_remove_an_asana_type()
	{
		$this->adminSignIn();

		$asanaType = create('App\AsanaType');

		$this->delete(route('admin.asanas.types.destroy', $asanaType->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_types', [
			'name' => $asanaType->name
		]);
	}

	/** @test */
	public function when_a_type_is_removed_its_relationship_with_asanas_is_also_removed()
	{
		$this->adminSignIn();

		$asanaType = create('App\AsanaType');

		$asana = create('App\Asana');

		$asana->types()->attach($asanaType);

		$this->delete(route('admin.asanas.types.destroy', $asanaType->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_asana_type', [
			'asana_type_id' => $asanaType->id
		]);
	}
}
