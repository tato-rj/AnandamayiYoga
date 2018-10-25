<?php

namespace Tests\Feature;

use Tests\AppTest;

class LessonTest extends AppTest
{
	/** @test */
	public function a_guest_can_see_a_browse_through_all_lessons_on_the_discover_page()
	{
		$lesson = create('App\Lesson', ['name' => 'Great lesson']);

		$this->get(route('discover.classes.index'))->assertSee('Great lesson'); 
	}

	/** @test */
	public function a_guest_can_see_a_tag_showing_that_a_lesson_is_free()
	{
		$lesson = create('App\Lesson', ['is_free' => 1]);
		
		$this->get(route('discover.classes.index'))->assertSee('free'); 
	}

	/** @test */
	public function a_guest_can_see_the_lesson_page()
	{
		$lesson = create('App\Lesson');
		$this->get(route('discover.classes.show', $lesson->slug))->assertSee($lesson->name);
	}

	/** @test */
	public function a_guest_can_only_view_lessons_that_are_free()
	{
		$lessonNotFree = create('App\Lesson', ['is_free' => false]);
		$lessonFree = create('App\Lesson', ['is_free' => true]);

		$this->get(route('discover.classes.show', $lessonNotFree->slug))->assertSee('Only members can view this lesson');
		$this->get(route('discover.classes.show', $lessonFree->slug))->assertDontSee('Only members can view this lesson');
	}

	/** @test */
	public function a_user_can_view_all_lessons()
	{
		$this->register();

		$lessonNotFree = create('App\Lesson');
		$lessonFree = create('App\Lesson', ['is_free' => 1]);

		$this->get(route('discover.classes.show', $lessonNotFree->slug))->assertDontSee('Only members can view this lesson');
		$this->get(route('discover.classes.show', $lessonFree->slug))->assertDontSee('Only members can view this lesson');
	}
}
