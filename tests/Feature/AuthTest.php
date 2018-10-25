<?php

namespace Tests\Feature;

use Tests\AppTest;

class AuthTest extends AppTest
{
	/** @test */
	public function a_guest_is_redirected_to_the_dedicated_login_page_if_it_tries_to_access_a_user_restricted_area()
	{
		$this->withExceptionHandling();

		$this->get(route('user.settings.profile'))
			 ->assertRedirect(route('login'));
	}

	/** @test */
	public function a_guest_is_redirected_to_the_dedicated_login_page_if_the_login_was_unsuccessful()
	{
		$this->withExceptionHandling();

		$this->post(route('login', [
			'email' => 'not-a-valid-email',
			'password' => 'not-a-valid-password'
		]))->assertRedirect(route('login'));
	}

	/** @test */
	public function a_guest_is_redirected_back_to_the_registration_page_if_the_input_fail_validation_when_signing_up()
	{
		$this->withExceptionHandling();

		$this->post(route('register', [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'doe@email.com',
			'genre' => 'male',
			'password' => 'no',
			'password_confirmation' => 'no'
		]))->assertRedirect(route('register'));
	}
}
