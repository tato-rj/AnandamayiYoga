<?php

namespace Tests\Feature;

use Tests\AppTest;

class EmailConfirmationTest extends AppTest
{
	/** @test */
	public function users_cannot_sign_in_until_they_confirm_their_email()
	{
		$this->register($confirmed = false);
		$this->get(route('user.home'))
			 ->assertRedirect(route('home'))
			 ->assertSessionHas('confirm-email');
	}

	/** @test */
	public function users_can_confirm_their_email_addresses()
	{
		$this->register($confirmed = false);
		
		$user = auth()->user();

		$this->assertFalse($user->confirmed);

		$this->confirmEmail()->assertRedirect(route('user.home'));

		$this->assertTrue($user->fresh()->confirmed);
	}
}
