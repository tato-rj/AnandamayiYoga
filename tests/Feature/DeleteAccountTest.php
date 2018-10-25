<?php

namespace Tests\Feature;

use Tests\AppTest;

class DeleteAccountTest extends AppTest
{
	/** @test */
	public function it_can_delete_its_own_account()
	{
		$this->register();

		$user = auth()->user();
		
		$this->assertDatabaseHas('users', ['email' => $user->email]);

		$this->deleteUser();

		$this->assertDatabaseMissing('users', ['email' => $user->email]);
	}
}
