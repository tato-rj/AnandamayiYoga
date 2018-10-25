<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class CategoryTest extends AppTest
{
	/** @test */
	public function a_manager_can_create_a_new_category()
	{
		$this->managerSignIn();

		$category = make('App\Category');

		$this->post(route('admin.categories.store', $category->toArray()))
			 ->assertSessionHas('status');

		$this->assertDatabaseHas('categories', [
			'name' => $category->name
		]);
	}

	/** @test */
	public function the_same_category_cannot_be_added_twice()
	{
		$this->managerSignIn();

		$category = make('App\Category');

		$this->post(route('admin.categories.store', $category->toArray()))
			 ->assertSessionHas('status');

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.categories.store', $category->toArray()));
	}

	/** @test */
	public function a_manager_can_edit_a_category()
	{
		$this->managerSignIn();

		$category = create('App\Category');

		$this->json('PATCH', route('admin.categories.update', $category->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('categories', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function a_manager_can_remove_a_category()
	{
		$this->managerSignIn();

		$category = create('App\Category');

		$this->delete(route('admin.categories.destroy', $category->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('categories', [
			'name' => $category->name
		]);
	}

	/** @test */
	public function when_a_category_is_removed_its_relationship_with_users_is_also_removed()
	{
		$category = create('App\Category');

		$this->register();

		$this->post(route('user.update.category', $category->id));

		$this->managerSignIn();

		$this->delete(route('admin.categories.destroy', $category->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('category_user', [
			'category_id' => $category->id
		]);
	}

	/** @test */
	public function when_a_category_is_removed_its_relationship_with_lessons_is_also_removed()
	{
		$this->managerSignIn();

		$category = create('App\Category');

		$lesson = create('App\Lesson');

		$lesson->categories()->attach($category);

		$this->delete(route('admin.categories.destroy', $category->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('category_lesson', [
			'category_id' => $category->id
		]);
	}

	/** @test */
	public function when_a_category_is_removed_its_relationship_with_programs_is_also_removed()
	{
		$this->managerSignIn();
		
		$category = create('App\Category');

		$program = create('App\Program');

		$program->categories()->attach($category);
		
		$this->delete(route('admin.categories.destroy', $category->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('category_program', [
			'category_id' => $category->id
		]);
	}
}
