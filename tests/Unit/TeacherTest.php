<?php

namespace Tests\Unit;

use Tests\AppTest;

class TeacherTest extends AppTest
{
	protected $course, $teacher, $category;

	public function setUp()
	{
		parent::setUp();

		$this->course = create('App\Course');

		$this->teacher = create('App\Teacher');

		$this->lesson = create('App\Lesson');

		$this->program = create('App\Program');

		$this->category = create('App\Category');

		$this->course->teachers()->save($this->teacher);

		$this->teacher->categories()->save($this->category);

		$this->teacher->lessons()->save($this->lesson);

		$this->teacher->programs()->save($this->program);
	}

	/** @test */
	public function it_has_many_lessons()
	{
		$this->assertInstanceOf('App\Lesson', $this->teacher->lessons()->first()); 

		$newLesson = create('App\Lesson');

		$this->teacher->lessons()->save($newLesson);

		$this->assertCount(2, $this->teacher->fresh()->lessons);		 
	}

	/** @test */
	public function it_has_many_programs()
	{
		$this->assertInstanceOf('App\Program', $this->teacher->programs()->first()); 

		$newProgram = create('App\Program');

		$this->teacher->programs()->save($newProgram);

		$this->assertCount(2, $this->teacher->fresh()->programs);		 
	}

	/** @test */
	public function it_has_many_courses()
	{
		$this->assertInstanceOf('App\Course', $this->teacher->courses()->first()); 

		$newCourse = create('App\Course');

		$this->teacher->courses()->save($newCourse);

		$this->assertCount(2, $this->teacher->fresh()->courses);
	}

	/** @test */
	public function it_has_many_articles()
	{
		create('App\Article', ['author_id' => $this->teacher->id]);

		$this->assertInstanceOf('App\Article', $this->teacher->articles()->first());		 
	}

	/** @test */
	public function it_has_many_categories()
	{
		$this->assertInstanceOf('App\Category', $this->teacher->categories()->first());
	}
}
