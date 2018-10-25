<?php

namespace Tests\Unit;

use Tests\AppTest;

class CourseTest extends AppTest
{
	protected $course;
	protected $chapter;

	public function setUp()
	{
		parent::setUp();

		$this->course = create('App\Course');

		$this->chapter = create('App\Chapter');

		$this->teacher = create('App\Teacher');

		$this->course->teachers()->save($this->teacher);
	}

	/** @test */
	public function it_can_have_many_authors()
	{
		$this->assertInstanceOf('App\Teacher', $this->course->teachers()->first());

		$newTeacher = create('App\Teacher');

		$this->course->teachers()->save($newTeacher);

		$this->assertCount(2, $this->course->fresh()->teachers);
	}

	/** @test */
	public function it_has_many_discussions()
	{
		$discussion = create('App\Discussion');
		$this->course->discussions()->save($discussion);
		
		$this->assertInstanceOf('App\Discussion', $this->course->discussions()->first());		 
	}

	/** @test */
	public function it_has_many_chapters()
	{
		$chapter1 = create('App\Chapter');
		$this->course->chapters()->save($chapter1);

		$chapter2 = create('App\Chapter');
		$this->course->chapters()->save($chapter2);

		$this->assertInstanceOf('App\Chapter', $this->course->chapters()->first());
		$this->assertEquals(2, count($this->course->chapters));
	}

	/** @test */
	public function its_knows_its_total_duration()
	{
		$chapter = create('App\Chapter', ['course_id' => $this->course->id]);

		$lecture1 = create('App\Lecture', [
			'chapter_id' => $chapter->id,
			'duration' => 10
		]);
		
		$lecture2 = create('App\Lecture', [
			'chapter_id' => $chapter->id,
			'duration' => 2
		]);

		$this->assertEquals(12, $this->course->duration());		 
	}

	/** @test */
	public function it_knows_the_percentage_of_its_lessons_that_have_been_viewed_by_the_user()
	{
		$this->register();

		$chapter1 = create('App\Chapter', ['course_id' => $this->course->id]);
		$chapter2 = create('App\Chapter', ['course_id' => $this->course->id]);

		$quiz = create('App\Quiz', ['chapter_id' => $chapter1->id]);
		$assignment = create('App\Assignment', ['chapter_id' => $chapter2->id]);
		$demonstration = create('App\Lecture', [
			'chapter_id' => $chapter1->id,
			'type' => 'demonstration']);
		$lecture = create('App\Lecture', [
			'chapter_id' => $chapter2->id,
			'type' => 'lecture']);

		auth()->user()->lectures()->save($lecture);
		auth()->user()->demonstrations()->save($demonstration);

		$this->assertEquals(100, $this->course->progress()); 		 
	}

	/** @test */
	public function a_guest_is_redirected_back_to_the_courses_page_when_trying_to_see_the_contents_of_an_unpublished_course()
	{
		$this->get(route('courses.show', $this->course->slug))
			 ->assertDontSee($this->course->description)
			 ->assertRedirect(route('courses.index'));

		$this->course->published = 1;
		$this->course->save();

		$this->get(route('courses.show', $this->course->slug))
			 ->assertSee($this->course->description);
	}
}
