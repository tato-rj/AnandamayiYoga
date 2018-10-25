<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{User, Subscription};

class SubscriptionTest extends AppTest
{
	/** @test */
	public function it_knows_its_status()
	{
		$randomSubscription = create('App\Subscription', ['list' => 'newsletter']);

		$this->assertNull($randomSubscription->user());

		$this->register();

		$memberSubscription = create('App\Subscription', [
			'list' => 'newsletter',
			'email' => auth()->user()->email]);

		$this->assertNotNull($memberSubscription->user());
	}
}
