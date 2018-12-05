<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Administrator, HasRoutine};
use App\Lesson;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class LessonTest extends AppTest
{
	use Administrator, HasRoutine;

	/** @test */
	public function an_admin_can_create_a_new_lesson()
	{
		$this->adminSignIn();
		
		$lesson = $this->createNewLesson();

		$this->assertDatabaseHas('lessons', [
			'name' => $lesson->name
		]);

		Storage::disk('s3')->assertExists("local/lessons/images/{$lesson->image->hashName()}");
		Storage::disk('s3')->assertExists("local/lessons/videos/{$lesson->video->hashName()}");

		$lesson = Lesson::first();

		$this->assertCount(4, $lesson->categories);
	}

	/** @test */
	public function a_lesson_can_be_assigned_to_a_teacher_when_created()
	{
		$this->adminSignIn();

		$lesson = $this->createNewLesson();

		$this->assertInstanceOf('App\Teacher', $lesson->teacher);		 
	}

	/** @test */
	public function the_same_lesson_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$lesson = $this->createNewLesson();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.classes.store', $lesson->toArray()));
	}

	/** @test */
	public function if_the_name_of_a_lesson_exists_the_admin_is_notified_right_after_typing_it()
	{
		$this->adminSignIn();

		$lesson = $this->createNewLesson();

		$this->json('POST', route('admin.classes.lookup', ['name' => $lesson->name]))
			 ->assertJson(['passes' => false]);

		$this->json('POST', route('admin.classes.lookup', ['name' => 'a new name']))
			 ->assertJson(['passes' => true]);
	}

	/** @test */
	public function an_admin_can_edit_a_lesson()
	{
		$this->adminSignIn();

		$lesson = create('App\Lesson');

		$this->json('PATCH', route('admin.classes.update', $lesson->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('lessons', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function an_admin_can_update_the_lesson_categories()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.classes.categories.update', $lesson->id), [
			'key' => 'category',
			'value' => create('App\Category')
		])->assertSuccessful();

		$this->assertCount(1, $lesson->fresh()->categories);
	}

	/** @test */
	public function an_admin_can_update_the_lesson_levels()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.classes.levels.update', $lesson->id), [
			'key' => 'levels',
			'value' => create('App\Level')
		])->assertSuccessful();

		$this->assertCount(1, $lesson->fresh()->levels);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$lessonRequest = $this->createNewLesson();

		$oldImage = $lessonRequest->image;

		$createdLesson = Lesson::first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/lessons/images/{$oldImage->hashName()}");

		$this->patch(route('admin.classes.image.update', $createdLesson->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/lessons/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/lessons/images/{$newImage->hashName()}");
	}

	/** @test */
	public function the_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$lessonRequest = $this->createNewLesson();

		$oldVideo = $lessonRequest->video;

		$createdLesson = Lesson::first();

		$newVideo = UploadedFile::fake()->image('newVideo.jpg');

		Storage::disk('s3')->assertExists("local/lessons/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.classes.video.update', $createdLesson->slug), [
			'video' => $newVideo,
			'duration' => 20
		]);

		Storage::disk('s3')->assertMissing("local/lessons/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/lessons/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function an_admin_can_remove_a_lesson()
	{
		$this->adminSignIn();

		$lesson = create('App\Lesson');

		$this->delete(route('admin.classes.destroy', $lesson->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('lessons', [
			'name' => $lesson->name
		]);
	}

	/** @test */
	public function the_lesson_categories_relationship_is_removed_when_the_lesson_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$this->assertDatabaseHas('category_lesson', [
			'lesson_id' => $lesson->id
		]);

		$this->delete(route('admin.classes.destroy', $lesson->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('category_lesson', [
			'lesson_id' => $lesson->id
		]);
	}

	/** @test */
	public function the_lesson_levels_relationship_is_removed_when_the_lesson_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$this->assertDatabaseHas('lesson_level', [
			'lesson_id' => $lesson->id
		]);

		$this->delete(route('admin.classes.destroy', $lesson->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('lesson_level', [
			'lesson_id' => $lesson->id
		]);
	}

	/** @test */
	public function the_lesson_image_and_video_are_removed_when_the_lesson_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$this->delete(route('admin.classes.destroy', $lesson->slug))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($lesson->image_path);
		Storage::disk('s3')->assertMissing($lesson->video_path);
	}

	/** @test */
	public function when_a_lesson_is_deleted_its_favorite_relatioship_with_a_user_is_also_removed()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$lessonId = $lesson->id;

		$this->logout();
		$this->register();

		$this->post(route('user.favorite.store'), [
			'favorited_id' => $lessonId,
			'favorited_type' => get_class($lesson)
		]);

		$this->adminSignIn();
		
		$this->delete(route('admin.classes.destroy', $lesson->slug));

		$this->assertDatabaseMissing('favorites', [
			'favorited_id' => $lessonId
		]);
	}

	/** @test */
	public function when_a_lesson_is_deleted_its_records_when_its_completed_are_also_removed()
	{
		$this->adminSignIn();

		$request = $this->createNewLesson();

		$lesson = Lesson::where('name', $request->name)->first();

		$lessonId = $lesson->id;

		$this->logout();
		$this->register();

		$this->json('POST', route('discover.classes.record-view', $lesson->slug));

		$this->adminSignIn();

		$this->delete(route('admin.classes.destroy', $lesson->slug));

		$this->assertDatabaseMissing('completed_lessons', [
			'lesson_id' => $lessonId
		]);
	}

	/** @test */
	public function when_a_lesson_is_deleted_its_relationship_with_any_routine_schedule_is_also_removed()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();

		$routine = $this->createRoutine($request);

		$lesson = Lesson::find($routine->schedules->first()->lesson_id);

		$lessonId = $lesson->id;

		$this->assertDatabaseHas('schedules', [
			'lesson_id' => $lessonId
		]);

		$this->delete(route('admin.classes.destroy', $lesson->slug));

		$this->assertDatabaseMissing('schedules', [
			'lesson_id' => $lessonId
		]);
	}
}
