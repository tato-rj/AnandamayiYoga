<?php

namespace Tests\Unit;

use Tests\AppTest;

class ProgramTest extends AppTest
{
	protected $program;

	public function setUp()
	{
		parent::setUp();

		$this->program = create('App\Program');
	}

	/** @test */
	public function it_knows_who_is_the_teacher()
	{		
		$teacher = create('App\Teacher');

		$program = create('App\Program', ['teacher_id' => $teacher->id]);

		$this->assertEquals($teacher->full_name, $program->teacher->full_name);
	}

	/** @test */
	public function it_can_have_many_categories()
	{
		$category1 = create('App\Category');
		$this->program->categories()->save($category1);

		$category2 = create('App\Category');
		$this->program->categories()->save($category2);

		$this->assertInstanceOf('App\Category', $this->program->categories()->first());
		$this->assertEquals(2, count($this->program->categories));
	}

	/** @test */
	public function it_has_many_lessons()
	{
		$lesson = create('App\Lesson');

		$this->program->lessons()->save($lesson);
		
		$this->assertInstanceOf('App\Lesson', $this->program->lessons()->first()); 
	}

	/** @test */
	public function it_knows_how_many_lessons_it_has()
	{
		$lessonOne = create('App\Lesson');
		$lessonTwo = create('App\Lesson');

		$this->program->lessons()->save($lessonOne);
		$this->program->lessons()->save($lessonTwo);

		$this->assertEquals(2, $this->program->lessons()->count()); 		 
	}

	/** @test */
	public function it_knows_the_percentage_of_its_lessons_that_have_been_viewed_by_the_user()
	{
		$this->register();

		$lessonComplete = create('App\Lesson');

		$this->program->lessons()->save($lessonComplete);
		$this->program->lessons()->save(create('App\Lesson'));
		$this->program->lessons()->save(create('App\Lesson'));
		$this->program->lessons()->save(create('App\Lesson'));

		auth()->user()->completedLessons()->save($lessonComplete);
		auth()->user()->completedLessons()->save($lessonComplete);

		$this->assertEquals(25, $this->program->progress()); 		 
	}
	
	/** @test */
	public function it_knows_if_it_has_been_completed_by_the_user()
	{
		$this->register();

		$lessonOne = create('App\Lesson');
		$lessonTwo = create('App\Lesson');

		$program = create('App\Program');

		$program->lessons()->save($lessonOne);
		$program->lessons()->save($lessonTwo);

		auth()->user()->completedLessons()->save($lessonOne);
		auth()->user()->completedLessons()->save($lessonTwo);

		$this->assertTrue($program->fresh()->isCompleted());
	}

	/** @test */
	public function it_knows_where_the_user_left_off()
	{
		$this->register();

		$lessonOne = create('App\Lesson');
		$lessonLeftOff = create('App\Lesson');

		$program = create('App\Program');

		$program->lessons()->save(create('App\Lesson'));
		$program->lessons()->save(create('App\Lesson'));
		$program->lessons()->save($lessonOne);
		$program->lessons()->save($lessonLeftOff);
		$program->lessons()->save(create('App\Lesson'));

		auth()->user()->completedLessons()->save($lessonOne);

		$this->assertEquals($lessonLeftOff->id, $program->fresh()->lessonLeftOff()->id);	
	}

	/** @test */
	public function it_knows_its_total_duration()
	{
		$tenMinutesLesson = create('App\Lesson', ['duration' => 10]);
		$fifteenMinutesLesson = create('App\Lesson', ['duration' => 15]);

		$this->program->lessons()->save($tenMinutesLesson);

		$this->program->lessons()->save($fifteenMinutesLesson);

		$this->assertEquals(25, $this->program->fresh()->duration);
	}

	/** @test */
	public function it_knows_if_it_has_been_favorited_by_the_user()
	{
		$this->register();

		$this->post(route('user.favorite.store', $this->program->slug), [
			'favorited_id' => $this->program->id,
			'favorited_type' => get_class($this->program)
		]);

		$this->assertTrue($this->program->fresh()->isFavorited());
	}

	/** @test */
	public function it_keeps_track_of_the_number_of_visits()
	{
		$program = create('App\Program');
		$program->lessons()->save(create('App\Lesson'));

		$this->assertEquals(0, $program->views);

		$this->get($program->path());

		$this->assertEquals(1, $program->fresh()->views);
	}

	/** @test */
	public function the_app_knows_the_total_amount_of_program_visits()
	{
		$program1 = create('App\Program');
		$program1->lessons()->save(create('App\Lesson'));
		$program2 = create('App\Program');
		$program2->lessons()->save(create('App\Lesson'));
		$program3 = create('App\Program');
		$program3->lessons()->save(create('App\Lesson'));

		$this->get($program1->path());
		$this->get($program1->path());
		$this->get($program2->path());
		$this->get($program2->path());
		$this->get($program3->path());

		$this->assertEquals(5, \App\Program::all()->sum('views'));
	}
}