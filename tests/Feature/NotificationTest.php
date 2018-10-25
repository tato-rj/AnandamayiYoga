<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\{Admin, HasRoutine, UsesFakeStripe};
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NotificationTest extends AppTest
{
	use Admin, HasRoutine, UsesFakeStripe;

	/** @test */
	public function a_user_can_mark_a_notification_as_read()
	{
		$this->register();
		$user = auth()->user();

		$this->assertFalse($user->unreadNotifications->isEmpty());
		$this->assertTrue($user->readNotifications->isEmpty());

		$this->post(route('user.notifications.read', $user->unreadNotifications()->first()->id));

		$this->assertFalse($user->fresh()->readNotifications->isEmpty());
	}

	/** @test */
	public function a_user_can_mark_all_notifications_as_read()
	{
		$this->register();
		$user = auth()->user();

		$this->assertFalse($user->unreadNotifications->isEmpty());
		$this->assertTrue($user->readNotifications->isEmpty());

		$this->post(route('user.notifications.read-all'));

		$this->assertTrue($user->fresh()->unreadNotifications->isEmpty());
		$this->assertFalse($user->fresh()->readNotifications->isEmpty());
	}

	/** @test */
	public function a_user_can_mark_a_notification_as_uread()
	{
		$this->register();
		$user = auth()->user();
		$notification = $user->unreadNotifications()->first();

		$this->post(route('user.notifications.read', $notification->id));

		$this->assertFalse($user->fresh()->unreadNotifications->isEmpty());
		$this->assertFalse($user->fresh()->readNotifications->isEmpty());

		$this->post(route('user.notifications.unread', $notification->id));

		$this->assertFalse($user->fresh()->unreadNotifications->isEmpty());
		$this->assertTrue($user->fresh()->readNotifications->isEmpty());
	}

	/** @test */
	public function a_user_can_see_all_notifications()
	{
		$this->register();
		$user = auth()->user();

		$notificationsCount = $user->notifications()->count();

		// After marking a notification as unread...
		$this->post(route('user.notifications.read', $user->unreadNotifications()->first()->id));

		// The user can still see all of them
		$response = $this->getJson(route('user.notifications.index', ['user' => $user->slug]))->json();

		$this->assertCount($notificationsCount, $response);
	}

	/** @test */
	public function notifications_are_deleted_when_a_user_is_deleted()
	{
		$this->register();

		$user = auth()->user();

		$notification = $user->notifications[0];

		$this->assertDatabaseHas('notifications', [
			'id' => $notification->id
		]);

		$this->deleteUser();

		$this->assertDatabaseMissing('notifications', [
			'id' => $notification->id
		]);
	}

	/** @test */
	public function users_are_notified_when_a_new_lesson_is_created_only_if_they_are_interested_in_any_of_the_lessons_categories()
	{
		$user = $this->register();

		$firstNotificationsCount = $user->notifications()->count();

		$this->assertCount($firstNotificationsCount, auth()->user()->unreadNotifications);

		$this->managerSignIn();

		$lessonUserWontLike = $this->createNewLesson();

		$this->signIn($user);

		$this->assertCount($firstNotificationsCount, auth()->user()->fresh()->unreadNotifications);

		$categoryUserLikes = create('App\Category');

		auth()->user()->categories()->attach($categoryUserLikes);

		Storage::fake('s3');
		
		$request = make('App\Lesson');

		$request->image = UploadedFile::fake()->image('image.jpg');
		$request->video = UploadedFile::fake()->image('video.mp4');

		$request->category = $categoryUserLikes;
		$request->levels = create('App\Level');

		$this->managerSignIn();
		
		$this->post('/office/classes', $request->toArray())
			 ->assertSessionHas('status');

		$this->signIn($user);

		$this->assertNotEquals($firstNotificationsCount, auth()->user()->fresh()->unreadNotifications);
	}

	/** @test */
	public function all_users_are_notified_when_a_new_program_is_created()
	{
		$user = $this->register();

		$firstNotificationsCount = $user->notifications()->count();

		$this->managerSignIn();
		
		$this->createNewProgram();

		$this->signIn($user);

		$this->assertNotEquals($firstNotificationsCount, auth()->user()->fresh()->unreadNotifications);
	}

	/** @test */
	public function users_are_notified_when_their_discussion_receives_a_reply()
	{
		$user1 = $this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', [
			'course_id' => $course->id,
			'user_id' => $user1->id]);

		$this->post(route('user.notifications.read-all'));

		$this->logout();

		$user2 = $this->register($confirmed = true, $email = 'anotheruser@email.com');

		$this->makeFakePurchase($course);

		$this->post(route('user.course.discussion.reply.store', [$course->slug, $discussion->id]), [
			'body' => 'A reply'
		]);

		$this->assertCount(1, $user1->fresh()->unreadNotifications);
	}
}
