<?php

namespace Tests\Feature;

use App\RoutineQuestionaire;
use Tests\Traits\HasRoutine;
use Tests\AppTest;

class RoutineTest extends AppTest
{
	use HasRoutine;

	/** @test */
	public function a_user_can_submit_a_routine_application()
	{
		$this->register();

		$this->submitRoutine()->assertSessionHas('status');

		$this->assertDatabaseHas('routine_questionaires', [
			'user_id' => auth()->user()->id
		]);
	}

	/** @test */
	public function a_user_sees_on_the_dashboard_a_notification_indicating_that_the_routine_is_in_progress_until_it_is_created_by_the_admin()
	{
		$this->signIn();

		auth()->user()->update(['confirmed' => true]);

		$this->submitRoutine();

		$request = RoutineQuestionaire::first();
		
		$this->get('/me')
			 ->assertSee('Your request for a 4-week Yoga Routine was received');
	}

	/** @test */
	public function a_user_cannot_submit_a_new_request_while_there_is_a_request_pending()
	{
		$this->register();

		$this->submitRoutine();

		$this->get(route('user.routine.form'))->assertDontSee('Prepare my Yoga routine');

		$this->submitRoutine()->assertSessionHas('error');
	}

	/** @test */
	public function a_user_cannot_submit_a_new_request_until_the_current_routine_is_finished()
	{
		$user = $this->register();
		
		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->get(route('user.routine.form'))->assertDontSee('Prepare my Yoga routine');

		$this->submitRoutine()->assertSessionHas('error');
	}

	/** @test */
	public function a_user_sees_the_routine_on_the_dashboard()
	{
		$user = $this->register();
		
		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$lesson = \App\Lesson::where('slug', $routine->lessons()->first())->first();

		$this->get('/me')->assertSee($lesson->name);
	}

	/** @test */
	public function routine_requests_are_deleted_when_a_user_is_deleted()
	{
		$this->register();

		$this->submitRoutine();

		$this->deleteUser();

		$this->assertDatabaseMissing('routine_questionaires', [
			'user_id' => auth()->user()->id
		]);		 
	}

	/** @test */
	public function it_keeps_count_of_the_users_views()
	{
		$user = $this->register();
		
		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$lessonOne = $routine->lessons()->first();

		$this->assertEquals(0, $routine->fresh()->views);

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]));

		$this->assertEquals(1, $routine->fresh()->views);
	}

	/** @test */
	public function it_shows_personalized_video_only_if_it_is_the_first_lesson_watched_on_the_routine()
	{
		$user = $this->register();
		
		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$lessonOne = $routine->lessons()->first();

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]))
			 ->assertSee($routine->video_path);

		$this->get(route('user.routine.show', ['routine' => $routine->id, 'lesson' => $lessonOne]))
			 ->assertRedirect(route('discover.classes.show', $lessonOne));
	}
}
