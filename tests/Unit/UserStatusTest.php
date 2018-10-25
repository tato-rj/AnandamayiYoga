<?php

namespace Tests\Unit;

use Tests\AppTest;
use Tests\Traits\{HasRoutine, UsesFakeStripe};

class UserStatusTest extends AppTest
{
	use HasRoutine, UsesFakeStripe;

	/** @test */
	public function it_starts_the_free_trial_once_the_email_has_been_confirmed()
	{
		$this->register($confirmed = false);

		$this->assertNull(auth()->user()->trial_ends_at);

		$this->confirmEmail();

		$this->assertNotNull(auth()->user()->trial_ends_at);
	}

	/** @test */
	public function a_user_knows_if_is_on_trial()
	{
		$this->register($confirmed = false);

		$this->assertFalse(auth()->user()->fresh()->isActive());
		$this->assertFalse(auth()->user()->isOnTrial());

		$this->confirmEmail();

		$this->assertTrue(auth()->user()->fresh()->isActive());
		$this->assertTrue(auth()->user()->fresh()->isOnTrial());
	}

	/** @test */
	public function a_user_knows_if_the_membership_is_active()
	{
		$user = $this->register();

		$this->assertTrue(auth()->user()->fresh()->isActive());
		$this->assertFalse(auth()->user()->hasMembership());

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());
		$this->assertTrue(auth()->user()->fresh()->hasMembership());
	}

	/** @test */
	public function a_user_knows_if_is_on_grace_period()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->cancelFakeMembership();

		$this->assertFalse(auth()->user()->fresh()->hasMembership());
		// dd(auth()->user()->fresh()->membership);
		$this->assertTrue(auth()->user()->fresh()->isActive());
		$this->assertTrue(auth()->user()->fresh()->isOnGracePeriod());	
	}

	/** @test */
	public function a_user_knows_if_the_account_is_inactive()
	{
		$this->register($confirmed = false);

		$this->assertFalse(auth()->user()->isActive());
		
		$this->confirmEmail();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		auth()->user()->trial_ends_at = \Carbon\Carbon::now()->subMonth();
		auth()->user()->save();

		$this->assertFalse(auth()->user()->fresh()->isActive());
	}
}
