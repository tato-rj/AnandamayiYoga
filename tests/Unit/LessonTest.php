<?php

namespace Tests\Unit;

use Tests\AppTest;

class LessonTest extends AppTest
{
	protected $lesson;

	public function setUp()
	{
		parent::setUp();

		$this->lesson = create('App\Lesson');
	}

	/** @test */
	public function it_knows_who_is_the_teacher()
	{		
		$teacher = create('App\Teacher');

		$lesson = create('App\Lesson', ['teacher_id' => $teacher->id]);

		$this->assertEquals($teacher->full_name, $lesson->teacher->full_name);
	}

	/** @test */
	public function it_has_many_levels()
	{
		$level1 = create('App\Level');
		$this->lesson->levels()->save($level1);

		$level2 = create('App\Level');
		$this->lesson->levels()->save($level2);

		$this->assertInstanceOf('App\Level', $this->lesson->levels()->first());
		$this->assertEquals(2, count($this->lesson->levels));		 
	}

	/** @test */
	public function it_knows_if_it_has_all_levels()
	{
		$level1 = create('App\Level');
		$level2 = create('App\Level');
		$level3 = create('App\Level');

		$this->lesson->levels()->save($level1);
		$this->lesson->levels()->save($level2);

		$this->assertFalse($this->lesson->hasAllLevels());

		$this->lesson->levels()->save($level3);

		$this->assertTrue($this->lesson->hasAllLevels());
	}

	/** @test */
	public function it_has_many_categories()
	{
		$category1 = create('App\Category');
		$this->lesson->categories()->save($category1);

		$category2 = create('App\Category');
		$this->lesson->categories()->save($category2);

		$this->assertInstanceOf('App\Category', $this->lesson->categories()->first());
		$this->assertEquals(2, count($this->lesson->categories));
	}

	/** @test */
	public function it_can_belong_to_a_program()
	{
		$program = create('App\Program');

		$this->lesson->program()->associate($program)->save();

		$this->assertInstanceOf('App\Program', $this->lesson->program); 
	}

	/** @test */
	public function it_knows_if_it_has_been_favorited_by_the_user()
	{
		$this->register();

		$this->post(route('user.favorite.store', $this->lesson->slug), [
			'favorited_id' => $this->lesson->id,
			'favorited_type' => get_class($this->lesson)
		]);

		$this->assertTrue($this->lesson->fresh()->isFavorited());
	}

	/** @test */
	public function it_keeps_track_of_the_number_of_visits()
	{
		$lesson = create('App\Lesson');

		$this->assertEquals(0, $lesson->views);

		$this->get($lesson->path());

		$this->assertEquals(1, $lesson->fresh()->views);
	}

	/** @test */
	public function the_app_knows_the_total_amount_of_lesson_visits()
	{
		$lesson1 = create('App\Lesson');
		$lesson2 = create('App\Lesson');
		$lesson3 = create('App\Lesson');

		$this->get($lesson1->path());
		$this->get($lesson1->path());
		$this->get($lesson2->path());
		$this->get($lesson2->path());
		$this->get($lesson3->path());

		$this->assertEquals(5, \App\Lesson::all()->sum('views'));
	}
}
