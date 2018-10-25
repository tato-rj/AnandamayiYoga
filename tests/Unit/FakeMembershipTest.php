<?php

namespace Tests\Unit;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;
use Tests\FakeStripe\{FakeStripe, FakeWebhooks};

class FakeMembershipTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function a_user_can_join_the_membership()
	{
		$this->register();

		$this->assertFalse(auth()->user()->hasMembership());

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->hasMembership());
	}

	/** @test */
	public function the_trial_period_ends_when_a_user_subscribes()
	{
		$this->register();

		$this->assertTrue(auth()->user()->isOnTrial());

		$this->createFakeMember();

		$this->assertFalse(auth()->user()->fresh()->isOnTrial());
	}
	
	/** @test */
	public function a_user_can_update_its_card_information()
	{
		$this->register();

		$this->assertFalse(auth()->user()->hasMembership());

		$customer = $this->createFakeMember();

		$firstCard = auth()->user()->fresh()->membership->card_brand;

		$customer->sources->data[0]->brand = 'NotVisa';

		auth()->user()->activate($customer);

		$this->assertNotEquals($firstCard, auth()->user()->fresh()->membership->card_brand);	 
	}

	/** @test */
	public function a_user_can_resume_a_canceled_membership()
	{
		$this->register();

		$customer = $this->createFakeMember();

		$subscriptionId = auth()->user()->membership->stripe_subscription;

		$this->cancelFakeMembership();

		$this->assertTrue(auth()->user()->fresh()->isOnGracePeriod());

		auth()->user()->activate($customer);

		$this->assertFalse(auth()->user()->fresh()->isOnGracePeriod());

		$this->assertEquals($subscriptionId, auth()->user()->fresh()->membership->stripe_subscription);
	}

	/** @test */
	public function a_user_can_cancel_the_membership_immediately()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->cancelFakeMembershipImmediately();

		$this->assertFalse(auth()->user()->fresh()->isActive());

		$this->assertFalse(auth()->user()->fresh()->isOnGracePeriod());	 
	}
}
