<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\Administrator;
use App\Subscription;

class SubscriptionTest extends AppTest
{
	use Administrator;

	/** @test */
	public function admins_can_see_all_emails_on_each_list()
	{
		$lists = Subscription::lists();

		$this->adminSignIn();

		foreach ($lists as $list) {
			$email = 'myemail@email.com';

			$this->subscribe($list, $email);

			$this->get(route('admin.subscriptions.index', ['list' => $list]))
				 ->assertSee($email);			
		}
	}
}
