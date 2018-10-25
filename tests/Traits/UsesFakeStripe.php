<?php

namespace Tests\Traits;

use App\Events\UserCanceledMembership;
use Tests\FakeStripe\{FakeStripe, FakeWebhooks};

trait UsesFakeStripe
{
	public function createFakeMember()
	{
		$customer = (new FakeStripe)->createCustomer;

		auth()->user()->activate($customer);

		return $customer;
	}

	public function cancelFakeMembership()
	{
		$membership = (new FakeStripe)->cancelMembership;

		auth()->user()->deactivate($membership);
		
		event(new UserCanceledMembership(auth()->user()));

		return $membership;
	}

	public function cancelFakeMembershipImmediately()
	{
		$membership = (new FakeStripe)->cancelMembershipImmediately;

		auth()->user()->deactivate($membership);

		return $membership;
	}

	public function createFakeSucceededCharge()
	{
		$chargeSucceeded = (new FakeWebhooks)->chargeSucceeded;

		auth()->user()->recordPayment($chargeSucceeded);
	}

	public function createFakeProductSucceededCharge()
	{
		$productChargeSucceeded = (new FakeWebhooks)->productChargeSucceeded;

		auth()->user()->recordPayment($productChargeSucceeded);
	}

	public function createFakeFailedCharge()
	{
		$chargeFailed = (new FakeWebhooks)->chargeFailed;

		auth()->user()->recordPayment($chargeFailed);
	}

	public function createFakeRefund()
	{
		$chargeRefunded = (new FakeWebhooks)->chargeRefunded;

		auth()->user()->recordPayment($chargeRefunded);
	}

	public function makeFakePurchase($product)
	{
		$customer = (new FakeStripe)->createCustomer;
		$charge = (new FakeStripe)->createCharge;

		auth()->user()->purchase($product, $customer, $charge);
	}
}
