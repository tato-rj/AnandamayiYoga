<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\InteractsWithStripe;

class LiveMembershipTest extends AppTest
{
	use InteractsWithStripe;

	/** @test */
	public function a_user_can_join_the_membership()
	{
		if ($this->liveTest) {

			$this->makeSubscribedUser();

			$this->assertTrue(auth()->user()->fresh()->hasMembership());

			$subscription = $this->assertStripeHasSubscription(auth()->user()->fresh()->membership->stripe_subscription);

			$this->assertNull($subscription->canceled_at);

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_user_can_resume_the_membership()
	{
		if ($this->liveTest) {

			$this->makeSubscribedUser();

			auth()->user()->membership->cancel();

			$this->assertTrue(auth()->user()->fresh()->isOnGracePeriod());

			auth()->user()->fresh()->membership->resume();

			$this->assertFalse(auth()->user()->fresh()->isOnGracePeriod());

			$this->assertTrue(auth()->user()->fresh()->isActive());

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}
	}
	
	/** @test */
	public function a_user_can_apply_a_coupon_code_to_a_membership()
	{
		if ($this->liveTest) {

			$this->makeSubscribedUser($coupon = 'TEST_COUPON');

			$this->assertTrue(auth()->user()->fresh()->isActive());

			try {
				$invoiceWithDiscount = auth()->user()->membership->retrieveStripeCustomer()->invoices();

				$couponAppliedToStripe = $invoiceWithDiscount->data[0]->discount->coupon->id;

				$this->assertEquals('TEST_COUPON', $couponAppliedToStripe);	
			} catch (\Exception $e) {
				$this->fail('Coupon was expected, but has not been applied.');
			}

			$subscription = $this->assertStripeHasSubscription(auth()->user()->fresh()->membership->stripe_subscription);

			$this->assertNull($subscription->canceled_at);

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_user_can_cancel_the_membership()
	{
		if ($this->liveTest) {

			$this->makeSubscribedUser();

			auth()->user()->membership->cancel();

			$subscription = $this->assertStripeHasSubscription(auth()->user()->fresh()->membership->stripe_subscription);

			$this->assertNotNull($subscription->canceled_at);

			$this->assertTrue(auth()->user()->fresh()->isOnGracePeriod());

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_user_account_can_be_canceled_immediately_without_grace_period()
	{
		if ($this->liveTest) {

			$this->makeSubscribedUser();

			auth()->user()->membership->cancelImmediately();

			$subscription = $this->assertStripeHasSubscription(auth()->user()->fresh()->membership->stripe_subscription);

			$this->assertNotNull($subscription->canceled_at);

			$this->assertFalse(auth()->user()->fresh()->isOnGracePeriod());

			$this->assertFalse(auth()->user()->fresh()->isActive());	
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function stripe_will_no_longer_charge_the_user_when_the_account_is_deleted()
	{
		if ($this->liveTest) {
			$this->register();

			$this->assertFalse(auth()->user()->hasMembership());

			$token = $this->getStripeToken();

			$this->createStripeCustomer($token);

			$stripeId = auth()->user()->fresh()->membership->stripe_id;

			$subscriptionId = auth()->user()->fresh()->membership->stripe_subscription;

			$this->deleteUser();

			$subscription = $this->assertStripeHasSubscription($subscriptionId);

			$this->assertNotNull($subscription->canceled_at);
		} else {
			$this->assertFalse($this->liveTest);
		}
	}
}
