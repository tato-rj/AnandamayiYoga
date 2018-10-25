<?php

namespace Tests\Unit;

use App\Feedback;
use Tests\Traits\SendsFeedback;
use Tests\AppTest;

class FeedbackTest extends AppTest
{
	use SendsFeedback;

	/** @test */
	public function it_knows_which_model_it_is_related_to()
	{
		$this->register();

		$this->submitProgramFeedback();
		
		$feedback = Feedback::first();

		$this->assertInstanceOf('App\Program', $feedback->model()); 
	}
}
