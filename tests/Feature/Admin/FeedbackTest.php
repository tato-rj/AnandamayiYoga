<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Admin, SendsFeedback};
use App\Feedback;

class FeedbackTest extends AppTest
{
	use Admin, SendsFeedback;

	/** @test */
	public function managers_can_see_all_feedbacks()
	{
		$this->managerSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->get(route('admin.feedbacks.index'))->assertSee($experience->comment);
	}

	/** @test */
	public function managers_can_see_a_specific_feedback()
	{
		$this->managerSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->get(route('admin.feedbacks.show', $experience->id))->assertSee($experience->comment);
	}

	/** @test */
	public function managers_can_delete_a_feedback()
	{
		$this->managerSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->delete(route('admin.feedbacks.destroy', $experience->id))->assertSessionHas('status');

		$this->assertDatabaseMissing('feedbacks', ['score' => $experience->score]);
	}
}
