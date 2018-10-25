<?php

namespace Tests\Unit;

use App\UserRecord;
use Tests\AppTest;
use Tests\Traits\{RecordsActivity, UsesFakeStripe};

class UserRecordTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function it_keeps_record_of_every_new_signup()
	{
		$user = $this->register($confirmed = false);

		$this->assertDatabaseHas('user_records', [
			'user_id' => $user->id
		]);
	}

	/** @test */
	public function the_same_event_cannot_be_recorded_twice()
	{
		UserRecord::new(1);
		UserRecord::new(1);

		$this->assertEquals(1, UserRecord::count());
	}

	/** @test */
	public function it_keeps_record_when_the_user_is_deleted()
	{
		$this->register();

		$user = auth()->user();

		$record = UserRecord::where('user_id', $user->id)->first();

		$this->assertDatabaseHas('users', ['email' => $user->email]);
		$this->assertFalse($record->fresh()->deleted);

		$this->deleteUser();

		$this->assertDatabaseMissing('users', ['email' => $user->email]);
		$this->assertTrue($record->fresh()->deleted);
	}

	/** @test */
	public function records_persist_even_after_a_user_has_deleted_their_account()
	{
		$user = $this->register();

		$this->deleteUser();

		$this->assertDatabaseHas('user_records', [
			'user_id' => $user->id
		]);
	}

	/** @test */
	public function it_keeps_record_when_the_user_confirms_the_email()
	{
		$user = $this->register($confirmed = false);

		$record = UserRecord::where('user_id', $user->id)->first();

		$this->assertFalse($record->confirmed);

		$this->confirmEmail();

		$this->assertTrue($record->fresh()->confirmed);
	}

	/** @test */
	public function it_keeps_record_when_the_user_joins_the_membership()
	{
		$user = $this->register();

		$record = UserRecord::where('user_id', $user->id)->first();

		$this->assertFalse($record->is_member);

		$this->createFakeMember();

		$this->assertTrue($record->fresh()->is_member);
	}
}
