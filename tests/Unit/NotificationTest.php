<?php

namespace Tests\Unit;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;

class NotificationTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function a_user_receives_trial_start_notification_upon_registration()
	{
		$this->register();
		
		$this->assertNotificationsHasType('free trial');
	}
	
	/** @test */
	public function a_user_receives_a_notification_about_changing_their_profile_picture_upon_registration()
	{
		$this->register();
		
		$this->assertNotificationsHasType('profile-picture');
	}

	/** @test */
	public function a_user_receives_an_incomplete_profile_notification_upon_registration_only_if_relevant()
	{
		$this->register();
		
		$this->assertNotificationsHasType('profile');
	}

	/** @test */
	public function a_user_receives_a_notification_when_they_become_members()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertNotificationsContains('We are thrilled that you\'ve joined us. Check out our Yoga Routine service and create your own today!');
	}

	/** @test */
	public function a_user_receives_a_notification_when_they_cancel_the_membership()
	{
		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->assertNotificationsContains(
			"Your membership has been canceled. You will remain active until the end of your current billing cycle."
		);		 
	}

	/** @test */
	public function a_user_receives_a_notification_when_they_resume_their_membership()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertNotificationsDontContain(
			"Your membership is now active again!"
		);

		$this->cancelFakeMembership();

		$this->createFakeMember();

		$this->assertNotificationsContains(
			"Your membership is now active again!"
		);		
	}
}
