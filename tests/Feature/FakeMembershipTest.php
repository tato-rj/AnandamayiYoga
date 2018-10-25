<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;
use Tests\FakeStripe\{FakeStripe, FakeWebhooks};

class FakeMembershipTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function only_active_members_or_users_on_grace_period_have_access_to_paid_content()
	{
		$lesson = create('App\Lesson', ['is_free' => false]);

		$this->get($lesson->path())->assertSee('Only members can view this lesson');

		$this->register();

		$this->assertTrue(auth()->user()->can('view', $lesson));

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->can('view', $lesson));

		$this->cancelFakeMembership();

		$this->assertTrue(auth()->user()->fresh()->can('view', $lesson));

		$this->cancelFakeMembershipImmediately();

		$this->assertFalse(auth()->user()->fresh()->can('view', $lesson));
	}

	/** @test */
	public function a_user_sees_a_message_on_the_dashboard_if_their_last_payment_was_declined()
	{
		$this->register();

		$this->createFakeMember();

		$this->createFakeFailedCharge();

		$this->get(route('user.home'))->assertSee('Please update your card to avoid losing your membership');
	}

	/** @test */
	public function a_user_sees_a_message_on_the_dashboard_while_on_the_grace_period()
	{
		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->get(route('user.home'))->assertSee('Your account will remain active until');		 
	}

	/** @test */
	public function a_user_sees_a_message_on_the_dashboard_while_on_trial()
	{
		$this->register();

		$this->get(route('user.home'))->assertSee(auth()->user()->trial_ends_at->diffForHumans());

		$this->register();
		
		$this->createFakeMember();

		$this->get(route('user.home'))->assertDontSee('Your free trial expires in');
	}
}
