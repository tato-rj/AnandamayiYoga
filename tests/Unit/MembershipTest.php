<?php

namespace Tests\Unit;

use App\Http\Controllers\Billing\MembershipController;
use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;

class MembershipTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function it_converts_a_stripe_event_name_to_a_method_name()
	{
		$eventName = 'customer.subscription.created';
		$methodName = 'whenCustomerSubscriptionCreated';

		$convertedName = (new MembershipController)->eventToMethod($eventName);

		$this->assertEquals($convertedName, $methodName); 
	}
}
