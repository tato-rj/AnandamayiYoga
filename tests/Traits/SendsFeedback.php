<?php

namespace Tests\Traits;

trait SendsFeedback
{
	public function submitExperienceFeedback($email = null)
	{
		return $this->json('POST', route('feedback.store'), [
            'feedback_about' => 'experience',
            'feedback_score' => '5',
            'feedback_comment' => 'This is a test feedback.',
            'feedback_email' => $email
        ]);
	}

	public function submitPageFeedback($score = 5)
	{
		return $this->post(route('feedback.store'), [
            'feedback_about' => 'page',
            'feedback_score' => $score,
            'feedback_page' => url()->current()
        ]);
	}

	public function submitLessonFeedback($lesson = null)
	{
		$lesson  = $lesson ?? create('App\Lesson');

		return $this->post(route('feedback.store'), [
            'feedback_target_type' => get_class($lesson),
            'feedback_target_id' => $lesson->id,
            'feedback_score' => '1',
            'feedback_comment' => 'Too short',
        ]);
	}

	public function submitCourseFeedback($course = null)
	{
		if (! $course) {
			$course = create('App\Course');

			$this->makeFakePurchase($course);
		}

		$this->post(route('feedback.store'), [
            'feedback_target_type' => get_class($course),
            'feedback_target_id' => $course->id,
            'feedback_score' => '5',
            'feedback_comment' => 'Great course!',
        ]);
	}

	public function submitProgramFeedback($program = null)
	{
		$program = $program ?? create('App\Program');

		$this->post(route('feedback.store'), [
            'feedback_target_type' => get_class($program),
            'feedback_target_id' => $program->id,
            'feedback_score' => '5',
            'feedback_comment' => 'Great program!',
        ]);
	}
}
