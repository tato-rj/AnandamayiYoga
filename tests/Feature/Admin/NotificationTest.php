<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Admin, HasRoutine, UsesFakeStripe, SendsFeedback};
use Illuminate\Http\UploadedFile;

class NotificationTest extends AppTest
{
	use Admin, HasRoutine, UsesFakeStripe, SendsFeedback;

	/** @test */
	public function managers_can_mark_a_notification_as_read()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->managerSignIn($manager);

		$this->assertCount(1, $manager->unreadNotifications);
		$this->assertCount(0, $manager->readNotifications);

		$this->post(route('admin.notifications.read', $manager->unreadNotifications()->first()->id));

		$this->assertCount(0, $manager->fresh()->unreadNotifications);
		$this->assertCount(1, $manager->fresh()->readNotifications);
	}

	/** @test */
	public function managers_can_mark_all_notifications_as_read()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->managerSignIn($manager);

		$this->assertCount(1, $manager->unreadNotifications);
		$this->assertCount(0, $manager->readNotifications);

		$this->post(route('admin.notifications.read-all'));

		$this->assertCount(0, $manager->fresh()->unreadNotifications);
		$this->assertCount(1, $manager->fresh()->readNotifications);
	}

	/** @test */
	public function managers_can_mark_a_notification_as_uread()
	{
		$manager = $this->prepareManager();

		$this->register();
		$this->createFakeMember();

		$this->managerSignIn($manager);

		$notification = $manager->unreadNotifications()->first();

		$this->post(route('admin.notifications.read', $notification->id));

		$this->assertCount(1, $manager->fresh()->unreadNotifications);
		$this->assertCount(1, $manager->fresh()->readNotifications);

		$this->post(route('admin.notifications.unread', $notification->id));

		$this->assertCount(2, $manager->fresh()->unreadNotifications);
		$this->assertCount(0, $manager->fresh()->readNotifications);
	}

	/** @test */
	public function managers_can_see_all_notifications()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->managerSignIn($manager);

		// After marking a notification as unread...
		$this->post(route('admin.notifications.read', $manager->unreadNotifications()->first()->id));

		// The user can still see all of them
		$response = $this->getJson(route('admin.notifications.index'))->json();

		$this->assertCount(1, $response);
	}

	/** @test */
	public function managers_are_notified_when_a_new_user_signs_up()
	{
		$manager = $this->prepareManager();

		$this->register();
		
		$this->assertCount(1, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_a_user_changes_its_profile_picture()
	{
		$manager = $this->prepareManager();

		$this->register();

		$file = UploadedFile::fake()->image('avatar.jpg');
		
		$this->uploadAvatar($file);

		$this->assertCount(2, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_a_user_starts_its_routine()
	{
		$manager = $this->prepareManager();

		$user = $this->register();
		$request = $this->requestRoutine();

		$this->managerSignIn($manager);

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$lessonOne = $routine->lessons()->first();

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]));

		$this->assertCount(2, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_a_user_becomes_a_member()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->createFakeMember();

		$this->assertCount(2, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_a_membership_is_canceled()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->assertCount(3, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_a_membership_is_resumed()
	{
		$manager = $this->prepareManager();

		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->createFakeMember();

		$this->assertCount(4, $manager->fresh()->unreadNotifications);
	}

	/** @test */
	public function managers_are_notified_when_the_user_is_removed()
	{
		$manager = $this->prepareManager();

		$user = $this->register();
		
		$this->assertCount(1, $manager->fresh()->unreadNotifications);

		$this->managerSignIn($manager);

		$this->delete(route('admin.users.destroy', $user->id));

		$this->assertCount(2, $manager->fresh()->unreadNotifications);
	}
}
