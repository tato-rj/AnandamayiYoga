<?php

namespace Tests\Feature;

use Tests\AppTest;

class CategoryTest extends AppTest
{
	/** @test */
	public function a_user_can_select_many_categories()
	{
		$this->register();

		$this->assertEmpty(auth()->user()->categories);

		$category1 = create('App\Category');
		$category2 = create('App\Category');

		$this->post(route('user.update.category', $category1->id));
		$this->post(route('user.update.category', $category2->id));

		$this->assertNotEmpty(auth()->user()->fresh()->categories);
	}

	/** @test */
	public function a_user_can_unselect_any_category()
	{
		$this->register();

		$category1 = create('App\Category');
		$category2 = create('App\Category');

		$this->post(route('user.update.category', $category1->id));
		$this->post(route('user.update.category', $category2->id));

		$this->assertEquals(2, count(auth()->user()->fresh()->categories));

		$this->post(route('user.update.category', $category2->id));

		$this->assertEquals(1, count(auth()->user()->fresh()->categories));
	}
}
