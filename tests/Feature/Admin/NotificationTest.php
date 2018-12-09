<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Administrator, HasRoutine, UsesFakeStripe, SendsFeedback};
use Illuminate\Http\UploadedFile;

class NotificationTest extends AppTest
{
	use Administrator, HasRoutine, UsesFakeStripe, SendsFeedback;

	/** @test */
	public function admins_can_mark_a_notification_as_read()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->adminSignIn($admin);

		$this->assertCount(1, $admin->unreadNotifications);
		$this->assertCount(0, $admin->readNotifications);

		$this->post(route('admin.notifications.read', $admin->unreadNotifications()->first()->id));

		$this->assertCount(0, $admin->fresh()->unreadNotifications);
		$this->assertCount(1, $admin->fresh()->readNotifications);
	}

	/** @test */
	public function admins_can_mark_all_notifications_as_read()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->adminSignIn($admin);

		$this->assertCount(1, $admin->unreadNotifications);
		$this->assertCount(0, $admin->readNotifications);

		$this->post(route('admin.notifications.read-all'));

		$this->assertCount(0, $admin->fresh()->unreadNotifications);
		$this->assertCount(1, $admin->fresh()->readNotifications);
	}

	/** @test */
	public function admins_can_mark_a_notification_as_uread()
	{
		$admin = $this->prepareAdmin();

		$this->register();
		$this->createFakeMember();

		$this->adminSignIn($admin);

		$notification = $admin->unreadNotifications()->first();

		$this->post(route('admin.notifications.read', $notification->id));

		$this->assertCount(1, $admin->fresh()->unreadNotifications);
		$this->assertCount(1, $admin->fresh()->readNotifications);

		$this->post(route('admin.notifications.unread', $notification->id));

		$this->assertCount(2, $admin->fresh()->unreadNotifications);
		$this->assertCount(0, $admin->fresh()->readNotifications);
	}

	/** @test */
	public function admins_can_see_all_notifications()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->adminSignIn($admin);

		// After marking a notification as unread...
		$this->post(route('admin.notifications.read', $admin->unreadNotifications()->first()->id));

		// The user can still see all of them
		$response = $this->getJson(route('admin.notifications.index'))->json();

		$this->assertCount(1, $response);
	}

	/** @test */
	public function admins_are_notified_when_a_new_user_signs_up()
	{
		$admin = $this->prepareAdmin();

		$this->register();
		
		$this->assertCount(1, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_a_user_changes_its_profile_picture()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$file = UploadedFile::fake()->image('avatar.jpg');
		
		$this->uploadAvatar($file);

		$this->assertCount(2, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_a_user_starts_its_routine()
	{
		$admin = $this->prepareAdmin();

		$user = $this->register();
		$request = $this->requestRoutine();

		$this->adminSignIn($admin);

		$routine = $this->createRoutine($request);

		$this->signIn($user);
		
		$lessonOne = $routine->lessons()->first();

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]));

		$this->assertCount(2, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_a_user_becomes_a_member()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->createFakeMember();

		$this->assertCount(2, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_a_membership_is_canceled()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->assertCount(3, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_a_membership_is_resumed()
	{
		$admin = $this->prepareAdmin();

		$this->register();

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->createFakeMember();

		$this->assertCount(4, $admin->fresh()->unreadNotifications);
	}

	/** @test */
	public function admins_are_notified_when_the_user_is_removed()
	{
		$admin = $this->prepareAdmin();

		$user = $this->register();
		
		$this->assertCount(1, $admin->fresh()->unreadNotifications);

		$this->adminSignIn($admin);

		$this->delete(route('admin.users.destroy', $user->id));

		$this->assertCount(2, $admin->fresh()->unreadNotifications);
	}
}
