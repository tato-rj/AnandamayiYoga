<?php

namespace Tests\Feature;

use Tests\AppTest;

class UserTest extends AppTest
{
	/** @test */
	public function it_can_create_an_account()
	{
		$this->register();

		$this->assertDatabaseHas('users', [
			'first_name' => 'John'
		]);
	}

	/** @test */
	public function its_default_avatar_matches_its_gender()
	{
		$this->register();

		$this->assertRegexp('/male/', auth()->user()->avatar_path); 
	}

	/** @test */
	public function it_can_edit_its_profile()
	{
		$this->register();

		$user = auth()->user();
		$originalName = $user->fullName;
		$originalEmail = $user->email;
		$originalTimezone = $user->timezone;

		$this->json('POST', route('user.update.all'), [
			'first_name' => 'Albert'
		]);

		$this->assertNotEquals($originalName, $user->fresh()->fullName);
		$this->assertEquals($originalEmail, $user->fresh()->email);

		$this->json('POST', route('user.update.all'), [
			'email' => 'new@email.com'
		]);

		$this->assertNotEquals($originalEmail, $user->fresh()->email);
		$this->assertEquals($originalTimezone, $user->fresh()->timezone);
	}

	/** @test */
	public function it_receives_recommendations_based_on_its_preferred_levels_and_styles()
	{
		$this->register();

		$levelUserLikes = create('App\Level');
		$categoryUserLikes = create('App\Category');
		auth()->user()->categories()->save($categoryUserLikes);
		auth()->user()->update(['level_id' => $levelUserLikes->id]);

		$categoryUserDoesntLike = create('App\Category');
		$levelUserDoesntLike = create('App\Level');

		$lessonGoodForUser = create('App\Lesson');
		$lessonGoodForUser->categories()->save($categoryUserLikes);
		$lessonGoodForUser->levels()->save($levelUserLikes);

		$lessonTooHardForUser = create('App\Lesson');
		$lessonTooHardForUser->levels()->save($levelUserDoesntLike);
		$lessonTooHardForUser->categories()->save($categoryUserLikes);

		$lessonNotGoodForUser = create('App\Lesson');
		$lessonNotGoodForUser->categories()->save($categoryUserDoesntLike);

		$anotherLessonNotGoodForUser = create('App\Lesson');
		$anotherLessonNotGoodForUser->categories()->save($categoryUserDoesntLike);
		$anotherLessonNotGoodForUser->levels()->save($levelUserLikes);

		$recommendations = auth()->user()->getRecommendations();

		$this->assertEquals(1, count($recommendations));
	}

	/** @test */
	public function it_knows_when_it_completed_a_quiz()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$quiz = create('App\Quiz');

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'quiz', $quiz->id]), ['answer' => [1,0,2]]);

		$this->assertInstanceOf('Carbon\Carbon', auth()->user()->dateCompleted($quiz)); 		 
	}

	/** @test */
	public function it_knows_its_answer_to_a_quiz()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$quiz = create('App\Quiz');

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'quiz', $quiz->id]), ['answer' => [1,0,2]]);

		$this->assertEquals([1,0,2], auth()->user()->answerTo($quiz));
	}

	/** @test */
	public function it_knows_when_it_completed_an_assignment()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$assignment = create('App\Assignment');

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'assignment', $assignment->id]), ['answer' => 'My answer.']);

		$this->assertInstanceOf('Carbon\Carbon', auth()->user()->dateCompleted($assignment)); 		 
	}

	/** @test */
	public function it_knows_its_answer_to_an_assignment()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$assignment = create('App\Assignment');

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'assignment',$assignment->id]), ['answer' => 'My answer.']);

		$this->assertEquals('My answer.', auth()->user()->answerTo($assignment));
	}

	/** @test */
	public function it_knows_when_it_completed_a_lecture()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$lecture = create('App\Lecture', ['type' => 'lecture']);

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'lecture', $lecture->id]));

		$this->assertInstanceOf('Carbon\Carbon', auth()->user()->dateCompleted($lecture)); 		 
	}

	/** @test */
	public function it_knows_when_it_completed_a_demonstration()
	{
		$this->register();

		$course = create('App\Course');
		$chapter = create('App\Chapter');
		$demonstration = create('App\Lecture', ['type' => 'demonstration']);

		$this->post(route('user.course.chapter.answer.submit', [$course->slug, $chapter->id, 'lecture', $demonstration->id]));

		$this->assertInstanceOf('Carbon\Carbon', auth()->user()->dateCompleted($demonstration)); 		 
	}
}
