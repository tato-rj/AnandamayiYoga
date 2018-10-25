<?php

namespace Tests\Feature;

use Tests\AppTest;

class FiltersTest extends AppTest
{
	/** @test */
	public function a_guest_can_filter_lessons_by_category()
	{
		$lesson = create('App\Lesson');
		$categoryUserLikes = create('App\Category');
		$categoryUserDoesntLike = create('App\Category');

		$lesson->categories()->attach($categoryUserLikes);
		
		$this->get(route('discover.classes.index', ['categories' => $categoryUserLikes->slug]))
			 ->assertSee($lesson->name);

		$this->get(route('discover.classes.index', ['categories' => $categoryUserDoesntLike->slug]))
			 ->assertDontSee($lesson->name);
	}

	/** @test */
	public function a_guest_can_filter_lessons_by_levels()
	{
		$lesson = create('App\Lesson');
		$levelUserLikes = create('App\Level', ['name' => 'easy']);
		$levelUserDoesntLike = create('App\Level', ['name' => 'difficult']);

		$lesson->levels()->attach($levelUserLikes);

		$this->get(route('discover.classes.index', ['levels' => $levelUserLikes->name]))
			 ->assertSee($lesson->name);

		$this->get(route('discover.classes.index', ['levels' => $levelUserDoesntLike->name]))
			 ->assertDontSee($lesson->name);
	}

	/** @test */
	public function a_guest_can_filter_lessons_by_duration()
	{
		$lesson = create('App\Lesson', ['duration' => '20']);

		$this->get(route('discover.classes.index', ['duration' => '30']))
			 ->assertSee($lesson->name);

		$this->get(route('discover.classes.index', ['duration' => '5']))
			 ->assertDontSee($lesson->name);
	}

	/** @test */
	public function a_guest_can_filter_lessons_by_cost()
	{
		$lesson = create('App\Lesson', ['is_free' => 1]);

		$this->get(route('discover.classes.index', ['cost' => '1']))
			 ->assertSee($lesson->name);

		$this->get(route('discover.classes.index', ['cost' => '0']))
			 ->assertDontSee($lesson->name);
	}
}
