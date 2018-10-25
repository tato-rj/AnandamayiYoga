<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class AsanaSubTypeTest extends AppTest
{
	/** @test */
	public function a_manager_can_create_a_new_asana_sub_type()
	{
		$this->managerSignIn();

		$subtype = make('App\AsanaSubType');

		$this->post(route('admin.asanas.subtypes.store', $subtype->toArray()))
			 ->assertSessionHas('status');

		$this->assertDatabaseHas('asana_sub_types', [
			'name' => $subtype->name
		]);
	}

	/** @test */
	public function the_same_asana_sub_type_cannot_be_added_twice()
	{
		$this->managerSignIn();

		$subtype = make('App\AsanaSubType');

		$this->post(route('admin.asanas.subtypes.store', $subtype->toArray()))
			 ->assertSessionHas('status');

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post('/office/asana-subtypes', $subtype->toArray());
	}

	/** @test */
	public function a_manager_can_edit_an_asana_sub_type()
	{
		$this->managerSignIn();

		$subtype = create('App\AsanaSubType');

		$this->json('PATCH', route('admin.asanas.subtypes.update', $subtype->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('asana_sub_types', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function a_manager_can_remove_an_asana_sub_type()
	{
		$this->managerSignIn();

		$subtype = create('App\AsanaSubType');

		$this->delete(route('admin.asanas.subtypes.destroy', $subtype->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_sub_types', [
			'name' => $subtype->name
		]);
	}

	/** @test */
	public function when_a_type_is_removed_its_relationship_with_asanas_is_also_removed()
	{
		$this->managerSignIn();

		$subtype = create('App\AsanaSubType');

		$asana = create('App\Asana');

		$asana->types()->attach($subtype);

		$this->delete(route('admin.asanas.subtypes.destroy', $subtype->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_asana_sub_type', [
			'asana_sub_type_id' => $subtype->id
		]);
	}
}
