<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{User, Chapter, Quiz, Answer};

class QuizTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_chapter()
	{
		$chapter = create(Chapter::class);
		$quiz = create(Quiz::class, ['chapter_id' => $chapter->id]);

		$this->assertInstanceOf(Quiz::class, $chapter->quizzes->first());
	}

	/** @test */
	public function it_has_many_answers()
	{
		$quiz = create(Quiz::class);
		$answer = create(Answer::class, [
			'answerable_type' => get_class($quiz),
			'answerable_id' => $quiz->id
		]);

		$this->assertInstanceOf(Answer::class, $quiz->answers->first());
	}


	/** @test */
	public function it_knows_its_results()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$quiz = create('App\Quiz');
		
		$results = $quiz->getFeedback([0], $bool = true);

		$this->assertFalse($results[0]);
	}
}
