<?php

namespace Tests\Unit;

use Tests\AppTest;

class CategoryTest extends AppTest
{
	/** @test */
	public function it_has_many_lessons()
	{
		$category = create('App\Category');
		$lesson = create('App\Lesson');

		$lesson->categories()->save($category);

		$this->assertInstanceOf('App\Lesson', $category->fresh()->lessons->first());
	}

	/** @test */
	public function it_has_many_programs()
	{
		$category = create('App\Category');
		$program = create('App\Program');

		$program->categories()->save($category);

		$this->assertInstanceOf('App\Program', $category->fresh()->programs->first());
	}

	/** @test */
	public function it_has_many_users()
	{
		$this->register();

		$category = create('App\Category');

		auth()->user()->categories()->save($category);

		$this->assertInstanceOf('App\User', $category->fresh()->users->first());
	}

	/** @test */
	public function it_knows_how_many_lessons_it_has()
	{
		$category = create('App\Category');
		$lesson = create('App\Lesson');

		$lesson->categories()->save($category);

		$this->assertEquals(1, $category->fresh()->lessons_count);		 
	}

	/** @test */
	public function it_knows_how_many_programs_it_has()
	{
		$category = create('App\Category');
		$program = create('App\Program');

		$program->categories()->save($category);

		$this->assertEquals(1, $category->fresh()->programs_count);		 
	}

	/** @test */
	public function it_knows_how_many_users_it_has()
	{
		$this->register();

		$category = create('App\Category');

		auth()->user()->categories()->save($category);

		$this->assertEquals(1, $category->fresh()->users_count);		 
	}
}
