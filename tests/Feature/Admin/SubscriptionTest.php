<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\Admin;
use App\Subscription;

class SubscriptionTest extends AppTest
{
	use Admin;

	/** @test */
	public function managers_can_see_all_emails_on_each_list()
	{
		$lists = Subscription::lists();

		$this->managerSignIn();

		foreach ($lists as $list) {
			$email = 'myemail@email.com';

			$this->subscribe($list, $email);

			$this->get(route('admin.subscriptions.index', ['list' => $list]))
				 ->assertSee($email);			
		}
	}
}
