<?php

namespace Tests\Unit;

use Tests\AppTest;
use Tests\Traits\{UsesFakeStripe, HasRoutine};
use Tests\FakeStripe\{FakeStripe, FakeWebhooks};

class UserTest extends AppTest
{
	use UsesFakeStripe, HasRoutine;
	
	/** @test */
	public function it_has_a_routine()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$this->createRoutine($request);

		$this->signIn($user);

		$this->assertInstanceOf('App\Routine', auth()->user()->activeRoutine());
	}

	/** @test */
	public function it_has_many_completed_quizzes()
	{
		$this->register();

		$quiz = create('App\Quiz');

		auth()->user()->quizzes()->save($quiz);

		$this->assertInstanceOf('App\Quiz', auth()->user()->fresh()->quizzes->first()); 
	}

	/** @test */
	public function it_has_many_discussions()
	{
		$this->register();

		$discussion = create('App\Discussion', ['user_id' => auth()->user()->id]);

		$this->assertInstanceOf('App\Discussion', auth()->user()->fresh()->discussions->first()); 		 
	}

	/** @test */
	public function it_has_many_replies()
	{
		$this->register();

		$reply = create('App\Reply', ['user_id' => auth()->user()->id]);

		$this->assertInstanceOf('App\Reply', auth()->user()->fresh()->replies->first()); 		 
	}

	/** @test */
	public function it_has_many_completed_assignments()
	{
		$this->register();

		$assignment = create('App\Assignment');

		auth()->user()->assignments()->save($assignment);

		$this->assertInstanceOf('App\Assignment', auth()->user()->fresh()->assignments->first()); 
	}

	/** @test */
	public function it_has_many_completed_lectures()
	{
		$this->register();

		$lecture = create('App\Lecture', ['type' => 'lecture']);

		auth()->user()->lectures()->save($lecture);

		$demonstration = create('App\Lecture', ['type' => 'demonstration']);

		auth()->user()->demonstrations()->save($demonstration);

		$this->assertInstanceOf('App\Lecture', auth()->user()->fresh()->lectures->first());

		$this->assertCount(1, auth()->user()->fresh()->lectures);
	}

	/** @test */
	public function it_has_many_completed_demonstrations()
	{
		$this->register();

		$demonstration = create('App\Lecture', ['type' => 'demonstration']);

		auth()->user()->demonstrations()->save($demonstration);

		$lecture = create('App\Lecture', ['type' => 'lecture']);

		auth()->user()->lectures()->save($lecture);

		$this->assertInstanceOf('App\Lecture', auth()->user()->fresh()->demonstrations->first());

		$this->assertCount(1, auth()->user()->fresh()->demonstrations);
	}

	/** @test */
	public function it_knows_if_it_has_a_pending_routine()
	{
		$user = $this->register();

		$this->submitRoutine();

		$this->assertNotNull(auth()->user()->pendingRoutine()); 
	}

	/** @test */
	public function it_knows_if_the_routine_preview_video_has_been_watched()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$lessonOne = $routine->lessons()->first();

		$this->assertFalse(auth()->user()->startedRoutine()); 

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]));

		$this->assertTrue(auth()->user()->fresh()->startedRoutine()); 
	}

	/** @test */
	public function it_knows_if_it_has_routine_classes_to_watch_on_a_given_day()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$wrongDate = \Carbon\Carbon::now()->subWeek();
		$correctDate = \Carbon\Carbon::parse('2017-04-24');
		
		$this->assertCount(0, auth()->user()->classesOn($wrongDate));
		$this->assertCount(1, auth()->user()->classesOn($correctDate));		 
	}

	/** @test */
	public function it_knows_if_it_has_a_subscription()
	{
		$user = $this->register();

		$this->assertTrue(auth()->user()->isSubscribedTo('Journey')); 
	}

	/** @test */
	public function if_knows_if_it_has_purchased_a_product()
	{
		$this->register();

		$course = create('App\Course');

		$this->makeFakePurchase($course);
		
		$this->assertTrue(auth()->user()->hasPurchased($course));
	}

	/** @test */
	public function it_knows_when_was_the_last_login()
	{
		$user = $this->register();

		$user = auth()->user();

		$this->assertNull($user->last_login_at);

		$this->logout();

		$this->post(route('login'), [
			'email' => $user->email,
			'password' => 'secret'
		]);
		
		$this->assertNotNull($user->fresh()->last_login_at);
	}

	/** @test */
	public function it_knows_if_has_chosen_a_given_category()
	{
		$user = $this->register();

		$category = create('App\Category');

		auth()->user()->categories()->save($category);

		$this->assertTrue(auth()->user()->fresh()->hasCategory($category->id)); 
	}

	/** @test */
	public function it_knows_if_it_has_selected_level_and_category_preferences()
	{
		$user = $this->register();

		$this->assertFalse(auth()->user()->hasPreferencesSelected());

		auth()->user()->update(['level_id' => 1]);

		$this->assertFalse(auth()->user()->fresh()->hasPreferencesSelected());

		$category = create('App\Category');

		auth()->user()->categories()->save($category);

		$this->assertTrue(auth()->user()->fresh()->hasPreferencesSelected());
	}

	/** @test */
	public function it_knows_if_it_has_finished_a_lesson()
	{
		$user = $this->register();

		$lesson = create('App\Lesson');

		$this->json('POST', route('discover.classes.record-view', $lesson->slug));

		$this->assertTrue(auth()->user()->fresh()->completedLessons->contains($lesson));
	}

	/** @test */
	public function it_knows_if_it_has_finished_a_program()
	{
		$user = $this->register();

		$program = create('App\Program');

		$this->json('POST', route('discover.programs.record-completed-program', $program->slug));

		$this->assertTrue(auth()->user()->fresh()->completedPrograms->contains($program));
	}

	/** @test */
	public function it_knows_when_was_the_last_time_it_finished_a_lesson()
	{
		$user = $this->register();

		$lesson = create('App\Lesson');

		$this->json('POST', route('discover.classes.record-view', $lesson->slug));

		$this->json('POST', route('discover.classes.record-view', $lesson->slug));

		\App\CompletedLesson::find(2)->update(['created_at' => \Carbon\Carbon::now()->subWeek()]);

		$this->assertEquals(\App\CompletedLesson::find(2)->created_at, auth()->user()->fresh()->lastTimeCompleted($lesson));
		$this->assertNotEquals(\App\CompletedLesson::find(1)->created_at, auth()->user()->fresh()->lastTimeCompleted($lesson));
	}

	/** @test */
	public function it_knows_if_it_has_finished_a_routine()
	{
		$user = $this->register();
		
		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->json('POST', route('user.routine.complete', $routine->id));

		$this->assertTrue(auth()->user()->fresh()->completedRoutines()->get()->contains($routine));
	}

	/** @test */
	public function it_knows_how_many_lessons_it_had_completed_on_a_given_date()
	{
		$user = $this->register();

		$completedLessonFromYesterday = create('App\Lesson');

		$completedLessonOneFromToday = create('App\Lesson');
		$completedLessonTwoFromToday = create('App\Lesson');
		$completedLessonThreeFromToday = create('App\Lesson');

		auth()->user()->completedLessons()->save($completedLessonFromYesterday);

		\App\CompletedLesson::find(1)->update([
			'created_at' => \Carbon\Carbon::now()->subDay()
		]);

		auth()->user()->completedLessons()->save($completedLessonOneFromToday);
		auth()->user()->completedLessons()->save($completedLessonTwoFromToday);
		auth()->user()->completedLessons()->save($completedLessonThreeFromToday);

		$this->assertEquals(1, auth()->user()->fresh()->completedLessonsOn(\Carbon\Carbon::now()->subDay()));
		$this->assertEquals(3, auth()->user()->fresh()->completedLessonsOn(\Carbon\Carbon::now()));
	}

	/** @test */
	public function it_knows_about_its_last_payment()
	{
		$user = $this->register();

		$this->createFakeMember();
		
		$this->createFakeSucceededCharge();

		$payment = \App\Billing\Payment::latest()->first();

		$this->assertEquals($payment->usd, auth()->user()->payments->last()->usd);
	}

	/** @test */
	public function its_preferences_are_removed_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();
		
		$category = create('App\Category');

		$user->categories()->save($category);

		$this->assertDatabaseHas('category_user', ['user_id' => $user->id]);

		$this->deleteUser();

		$this->assertDatabaseMissing('category_user', ['user_id' => $user->id]);		 
	}

	/** @test */
	public function its_favorite_lessons_are_removed_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();
		
		$favoriteLesson = create('App\Lesson');

		$user->favoriteLessons()->save($favoriteLesson);
		
		$this->assertCount(1, $user->favoriteLessons);
		
		$this->assertDatabaseHas('favorites', ['user_id' => $user->id]);

		$this->deleteUser();

		$this->assertDatabaseMissing('favorites', ['user_id' => $user->id]);
	}

	/** @test */
	public function its_favorite_programs_are_removed_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();
		
		$favoriteProgram = create('App\Program');

		$user->favoritePrograms()->save($favoriteProgram);
		
		$this->assertCount(1, $user->favoritePrograms);
		
		$this->assertDatabaseHas('favorites', ['user_id' => $user->id]);

		$this->deleteUser();

		$this->assertDatabaseMissing('favorites', ['user_id' => $user->id]);
	}

	/** @test */
	public function its_favorite_asanas_are_removed_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();
		
		$favoriteAsana = create('App\Asana');

		$user->favoriteAsanas()->save($favoriteAsana);

		$this->assertCount(1, $user->favoriteAsanas);
		
		$this->assertDatabaseHas('favorites', ['user_id' => $user->id]);

		$this->deleteUser();

		$this->assertDatabaseMissing('favorites', ['user_id' => $user->id]);
	}

	/** @test */
	public function its_view_records_are_removed_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();

		$lesson = create('App\Lesson');

		$user->completedLessons()->save($lesson);

		$this->assertDatabaseHas('completed_lessons', [
			'user_id' => $user->id,
			'lesson_id' => $lesson->id
		]);

		$this->deleteUser();

		$this->assertDatabaseMissing('completed_lessons', [
			'user_id' => $user->id,
			'lesson_id' => $lesson->id
		]);
	}

	/** @test */
	public function its_membership_records_are_deleted_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();

		$this->createFakeMember();

		$this->deleteUser();

		$this->assertDatabaseMissing('memberships', [
			'user_id' => $user->id
		]);
	}

	/** @test */
	public function its_payment_records_are_deleted_when_the_account_is_deleted()
	{
		$user = $this->register();

		$user = auth()->user();

		$this->createFakeMember();
		
		$this->createFakeSucceededCharge();

		$this->deleteUser();

		$this->assertDatabaseMissing('payments', [
			'user_id' => $user->id
		]);
	}

	/** @test */
	public function its_routine_schedule_is_removed_when_the_account_is_deleted()
	{
		$user = $this->register();
		
		$user = auth()->user();

		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$this->createRoutine($request);

		$this->signIn($user);

		$this->assertDatabaseHas('routines', [
			'user_id' => $user->id
		]);

		$this->assertDatabaseHas('schedules', [
			'routine_id' => $user->activeRoutine()->id
		]);

		$routineId = $user->activeRoutine()->id;

		$this->deleteUser();

		$this->assertDatabaseMissing('routines', [
			'user_id' => $user->id
		]);

		$this->assertDatabaseMissing('schedules', [
			'routine_id' => $routineId
		]);
	}

	/** @test */
	public function its_discussions_and_replies_are_removed_when_the_account_is_deleted()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['user_id' => auth()->user()->id]);

		$reply = create('App\Reply', ['user_id' => auth()->user()->id]);

		$this->deleteUser();

		$this->assertDatabaseMissing('discussions', ['body' => $discussion->body]);
		$this->assertDatabaseMissing('replies', ['body' => $reply->body]);	 
	}

	/** @test */
	public function all_replies_that_belong_to_a_users_discussion_are_removed_when_the_account_is_deleted()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['user_id' => auth()->user()->id]);

		$reply = create('App\Reply', [
			'discussion_id' => $discussion->id,
			'user_id' => 200]);

		$this->deleteUser();

		$this->assertDatabaseMissing('replies', ['body' => $reply->body]);	 		 
	}
}
