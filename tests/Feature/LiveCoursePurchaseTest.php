<?php

namespace Tests\Feature;

use App\User;
use App\Billing\Purchase;
use Tests\AppTest;
use Tests\Traits\InteractsWithStripe;

class LiveCoursePurchaseTest extends AppTest
{
	use InteractsWithStripe;

	/** @test */
	public function a_guest_starts_the_free_trial_when_purchasing_a_course()
	{
		if ($this->liveTest) {
			$this->expectsEvents(\App\Events\Purchases\CoursePurchased::class);

			$course = create('App\Course');
			
			$this->purchase($user = null, $course);

			$this->assertDatabaseHas('purchases', [
				'product_type' => get_class($course),
				'product_id' => $course->id
			]);

			$stripeId = Purchase::where('product_id', $course->id)->first()->stripe_id;

			$this->deleteStripeCustomer($stripeId);
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_member_can_purchase_a_course()
	{
		if ($this->liveTest) {
			$this->expectsEvents(\App\Events\Purchases\CoursePurchased::class);

			$course = create('App\Course', ['published' => true]);
			
			$this->register();

			$this->assertCount(0, auth()->user()->purchases);

			$this->purchase($user = auth()->user(), $course);

			$this->assertCount(1, auth()->user()->fresh()->purchases);

			$stripeId = Purchase::where('product_id', $course->id)->first()->stripe_id;

			$this->deleteStripeCustomer($stripeId);
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_user_can_apply_a_coupon_code_to_a_course_purchase()
	{
		if ($this->liveTest) {
			$this->makeSubscribedUser();

			$coupon = create('App\Billing\Coupon', ['code' => 'TEST_DISCOUNT']);

			$course = create('App\Course', ['published' => true]);

			$this->purchase($user = auth()->user(), $course, $coupon->code);

			$this->assertEquals($coupon->code, auth()->user()->fresh()->purchases()->first()->coupon);

			$this->assertEquals($course->costInCents*($coupon->discount/100), auth()->user()->purchases()->first()->amount_paid);

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}
	}

	/** @test */
	public function a_user_is_notified_if_the_code_is_unusable()
	{
		if ($this->liveTest) {
			$this->makeSubscribedUser();

			$course = create('App\Course', ['published' => true]);

			$this->purchase($user = auth()->user(), $course, $coupon = 'WRONG_COUPON')->assertSessionHas('error');

			$this->assertCount(0, auth()->user()->purchases);

			$this->deleteStripeCustomer(auth()->user()->membership->stripe_id);		
		} else {
			$this->assertFalse($this->liveTest);
		}		 
	}

	/** @test */
	public function a_guest_who_purchased_a_course_sees_a_confirmation_message_together_with_the_confirm_email_message()
	{
		if ($this->liveTest) {
			$course = create('App\Course');
			
			$this->purchase($user = null, $course)->assertSessionHas('course_purchased');

			$stripeId = Purchase::where('product_id', $course->id)->first()->stripe_id;

			$this->deleteStripeCustomer($stripeId);
		} else {
			$this->assertFalse($this->liveTest);
		}		 
	}

	/** @test */
	public function a_guest_who_purchased_a_course_with_an_invalid_coupon_is_redirected_back_before_the_registration_goes_through()
	{
		if ($this->liveTest) {
			$course = create('App\Course');
			
			$response = $this->purchase($user = null, $course, $coupon = 'WRONG_COUPON');
			$response->assertSessionMissing('course_purchased');
			$response->assertSessionHas('error');

			$this->assertEquals(0, User::count());
		} else {
			$this->assertFalse($this->liveTest);
		}		 
	}

	/** @test */
	public function a_user_who_purchased_a_course_is_redirected_straight_to_the_course_page()
	{
		if ($this->liveTest) {
			$this->register();

			$course = create('App\Course', ['published' => true]);
			
			$this->purchase($user = auth()->user(), $course)->assertRedirect(route('courses.show', $course->slug));

			$stripeId = Purchase::where('product_id', $course->id)->first()->stripe_id;

			$this->deleteStripeCustomer($stripeId);
		} else {
			$this->assertFalse($this->liveTest);
		}		 
	}
}
