<?php

namespace Tests\Feature;

use App\Feedback;
use Tests\Traits\{UsesFakeStripe, SendsFeedback};
use Tests\AppTest;

class FeedbackTest extends AppTest
{
	use UsesFakeStripe, SendsFeedback;

	/** @test */
	public function visitors_can_leave_an_annonymous_feedback_on_their_experience_while_on_the_website()
	{
		$this->submitExperienceFeedback();

		$this->assertEquals(1, Feedback::about('experience')->count());
	}

	/** @test */
	public function users_can_submit_feedback_when_deleting_their_account()
	{
		$this->register();

		$this->deleteUser();

		$this->assertEquals(1, Feedback::about('delete')->count());
	}

	/** @test */
	public function visitors_can_say_if_the_content_on_a_page_was_helpful_or_not()
	{
		$this->submitPageFeedback();

        $this->assertEquals(1, Feedback::about('page')->count());
	}

	/** @test */
	public function visitors_cannot_submit_more_than_two_feedbacks_on_a_page_per_minute()
	{
		$this->withExceptionHandling();
		
		$this->submitPageFeedback();
		$this->submitPageFeedback();
		$this->submitPageFeedback();

        $this->assertEquals(2, Feedback::about('page')->count());
	}

	/** @test */
	public function users_can_submit_a_review_on_a_video_class()
	{
		$this->submitLessonFeedback();

		$this->assertEquals(1, Feedback::for('lesson')->count());
	}

	/** @test */
	public function users_can_submit_a_review_on_a_course()
	{
		$this->register();

		$this->submitCourseFeedback();

		$this->assertEquals(1, Feedback::for('course')->count());
	}

	/** @test */
	public function users_can_submit_a_review_on_a_program()
	{
		$this->register();

		$this->submitProgramFeedback();

		$this->assertEquals(1, Feedback::for('program')->count());
	}

	/** @test */
	public function a_user_knows_its_feedback_on_a_lesson()
	{
		$this->register();

		$lesson = create('App\Lesson');

		$this->submitLessonFeedback($lesson);

		$this->assertTrue(auth()->user()->hasFeedbackFor($lesson));		 
	}

	/** @test */
	public function a_user_knows_its_feedback_on_a_program()
	{
		$this->register();

		$program = create('App\Program');

		$this->submitProgramFeedback($program);

		$this->assertTrue(auth()->user()->hasFeedbackFor($program));		 
	}

	/** @test */
	public function a_user_knows_its_feedback_on_a_course()
	{
		$this->register();

		$course = create('App\Course');

		$this->makeFakePurchase($course);

		$this->submitCourseFeedback($course);

		$this->assertTrue(auth()->user()->hasFeedbackFor($course));		 
	}

	/** @test */
	public function a_user_knows_its_last_feedback_on_a_lesson()
	{
		$this->register();

		$lesson = create('App\Lesson');

		$this->submitLessonFeedback($lesson);

		$this->assertNotNull(auth()->user()->latestFeedbackFor($lesson));		 
	}

	/** @test */
	public function a_user_knows_its_last_feedback_on_a_program()
	{
		$this->register();

		$program = create('App\Program');

		$this->submitProgramFeedback($program);

		$this->assertNotNull(auth()->user()->latestFeedbackFor($program));		 
	}

	/** @test */
	public function a_user_knows_its_last_feedback_on_a_course()
	{
		$this->register();

		$course = create('App\Course');

		$this->makeFakePurchase($course);

		$this->submitCourseFeedback($course);

		$this->assertNotNull(auth()->user()->latestFeedbackFor($course));		 
	}
}
