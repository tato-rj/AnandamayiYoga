<?php

namespace Tests\Feature\Admin;

use App\Schedule;
use Tests\AppTest;
use Illuminate\Http\UploadedFile;
use Tests\Traits\HasRoutine;
use Illuminate\Support\Facades\Storage;

class RoutineTest extends AppTest
{
	use HasRoutine;

	/** @test */
	public function a_admin_can_see_pending_requests_on_the_admin_page()
	{
		$user = $this->register();

		$this->requestRoutine();

		$this->adminSignIn();

		$this->get(route('admin.routines.pending'))->assertSee($user->first_name);
	}

	/** @test */
	public function a_admin_can_create_a_routine()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->signIn($user);

		$this->assertEquals($routine->user_id, auth()->user()->id);

		Storage::disk('s3')->assertExists($routine->video_path);
	}

	/** @test */
	public function when_a_routine_is_created_the_request_is_maked_as_completed()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->assertNotNull($routine->load('questionaire')->questionaire->completed_at);
	}

	/** @test */
	public function a_admin_can_edit_a_routine()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$originalComment = $routine->comment;

		$this->patch(route('admin.routines.update', $routine->id), [
			'key' => 'comment',
			'value' => 'A different comment'
		]);

		$this->assertNotEquals($originalComment, $routine->fresh()->comment);
	}

	/** @test */
	public function a_routine_video_is_removed_when_the_admin_uploads_a_new_one()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$oldVideo = $routine->video_path;

		$newVideo = UploadedFile::fake()->image('newvideo.mp4');

		Storage::disk('s3')->assertExists($oldVideo);

		$this->patch(route('admin.routines.video.update', $routine->id), [
			'video' => $newVideo
		]);

		Storage::disk('s3')->assertMissing($oldVideo);
		Storage::disk('s3')->assertExists("local/routines/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function a_admin_can_edit_the_schedule_of_a_routine()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$firstDate = $routine->schedules->first();

		$this->assertEquals(1, Schedule::where('day', $firstDate->day)->count());

		$this->patch(route('admin.routines.schedule.update', $routine->id), [
			'key' => 'lessons',
			'value' => [
				$firstDate->day->format('Y-m-d'),
				$firstDate->time,
				create('App\Lesson')->id, 
				create('App\Lesson')->id, 
				create('App\Lesson')->id
			]
		]);

		$this->assertEquals(3, Schedule::where('day', $firstDate->day)->count());
	}

	/** @test */
	public function a_admin_can_delete_a_routine()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->delete(route('admin.routines.destroy', $routine->id));

		$this->assertDatabaseMissing('routines', [
			'user_id' => $routine->user_id
		]);
	}

	/** @test */
	public function a_routines_schedule_is_removed_when_the_routine_is_deleted()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->delete(route('admin.routines.destroy', $routine->id));

		$this->assertDatabaseMissing('schedules', [
			'routine_id' => $routine->id
		]);
	}

	/** @test */
	public function the_questionaire_is_removed_when_the_routine_is_deleted()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->delete(route('admin.routines.destroy', $routine->id));

		$this->assertDatabaseMissing('routine_questionaires', [
			'user_id' => $routine->user_id
		]);		
	}

	/** @test */
	public function a_routines_video_video_is_removed_when_the_routine_is_deleted()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$this->signIn($user);

		$this->delete(route('admin.routines.destroy', $routine->id));

		Storage::disk('s3')->assertMissing($routine->video_path);		
	}
}
