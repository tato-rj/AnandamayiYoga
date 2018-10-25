<?php

namespace Tests\Unit;

use Tests\AppTest;

class AssignmentTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_chapter()
	{
		$chapter = create('App\Chapter');
		$assignment = create('App\Assignment', ['chapter_id' => $chapter->id]);

		$this->assertInstanceOf('App\Assignment', $chapter->assignments->first());
	}

	/** @test */
	public function it_has_many_answers()
	{
		$assignment = create('App\Assignment');
		$answer = create('App\Answer', [
			'answerable_type' => get_class($assignment),
			'answerable_id' => $assignment->id
		]);

		$this->assertInstanceOf('App\Answer', $assignment->answers->first());
	}

	/** @test */
	public function it_knows_if_it_has_been_reviewed_by_the_teacher()
	{
		$assignment = create('App\Assignment');
		$answer = create('App\Answer', [
			'answerable_type' => get_class($assignment),
			'answerable_id' => $assignment->id
		]);

		$this->assertFalse($assignment->answers->first()->isReviewed());

		$assignment->answers->first()->update(['is_correct' => 0]);

		$this->assertTrue($assignment->answers->first()->fresh()->isReviewed()); 
	}
}
