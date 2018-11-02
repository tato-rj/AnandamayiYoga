<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Administrator, SendsFeedback};
use App\Feedback;

class FeedbackTest extends AppTest
{
	use Administrator, SendsFeedback;

	/** @test */
	public function admins_can_see_all_feedbacks()
	{
		$this->adminSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->get(route('admin.feedbacks.index'))->assertSee($experience->comment);
	}

	/** @test */
	public function admins_can_see_a_specific_feedback()
	{
		$this->adminSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->get(route('admin.feedbacks.show', $experience->id))->assertSee($experience->comment);
	}

	/** @test */
	public function admins_can_delete_a_feedback()
	{
		$this->adminSignIn();
		
		$this->submitExperienceFeedback();

		$experience = Feedback::about('experience')->first();

		$this->delete(route('admin.feedbacks.destroy', $experience->id))->assertSessionHas('status');

		$this->assertDatabaseMissing('feedbacks', ['score' => $experience->score]);
	}
}
