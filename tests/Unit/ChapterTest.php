<?php

namespace Tests\Unit;

use Tests\AppTest;

class ChapterTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_course()
	{
		$course = create('App\Course');
		$chapter = create('App\Chapter', ['course_id' => $course->id]);

		$this->assertInstanceOf('App\Course', $chapter->course);
	}

	/** @test */
	public function it_has_many_discussions()
	{
		$course = create('App\Course');
		$chapter = create('App\Chapter', ['course_id' => $course->id]);

		$discussion = create('App\Discussion', ['chapter_id' => $chapter->id]);
		$course->discussions()->save($discussion);
		
		$this->assertInstanceOf('App\Discussion', $chapter->discussions()->first());		 
	}

	/** @test */
	public function it_has_many_supporting_materials()
	{
		$chapter = create('App\Chapter');
		$material = create('App\SupportingMaterial', ['chapter_id' => $chapter->id]);

		$this->assertInstanceOf('App\SupportingMaterial', $chapter->supportingMaterials->first());
	}

	/** @test */
	public function its_knows_its_total_duration()
	{
		$chapter = create('App\Chapter');

		$lecture = create('App\Lecture', [
			'type' => 'lecture',
			'chapter_id' => $chapter->id]);
		
		$quiz = create('App\Quiz', ['chapter_id' => $chapter->id]);

		$duration = $lecture->duration + $quiz->duration;

		$this->assertEquals($duration, $chapter->duration());		 
	}

	/** @test */
	public function its_quiz_is_completed_by_many_users()
	{
		$this->register();

		$quiz = create('App\Quiz');

		auth()->user()->quizzes()->save($quiz);

		$this->assertInstanceOf('App\User', $quiz->fresh()->users->first()); 
	}

	/** @test */
	public function its_assignment_is_completed_by_many_users()
	{
		$this->register();

		$assignment = create('App\Assignment');

		auth()->user()->assignments()->save($assignment);

		$this->assertInstanceOf('App\User', $assignment->fresh()->users->first()); 
	}

	/** @test */
	public function its_lecture_is_completed_by_many_users()
	{
		$this->register();

		$lecture = create('App\Lecture', ['type' => 'lecture']);

		auth()->user()->lectures()->save($lecture);

		$this->assertInstanceOf('App\User', $lecture->fresh()->users->first()); 
	}

	/** @test */
	public function its_demonstration_is_completed_by_many_users()
	{
		$this->register();

		$demonstration = create('App\Lecture', ['type' => 'demonstration']);

		auth()->user()->demonstrations()->save($demonstration);

		$this->assertInstanceOf('App\User', $demonstration->fresh()->users->first()); 
	}
}
