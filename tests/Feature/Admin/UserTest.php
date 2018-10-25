<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class UserTest extends AppTest
{
	/** @test */
	public function a_manager_can_delete_a_user()
	{
		$user = $this->register();

		$this->managerSignIn();

		$this->delete(route('admin.users.destroy', $user->id));

		$this->assertDatabaseMissing('users', [
			'id' => $user->id
		]);
	}
}
