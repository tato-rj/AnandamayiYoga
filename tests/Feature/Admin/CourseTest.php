<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\Administrator;
use App\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CourseTest extends AppTest
{
	use Administrator;

	/** @test */
	public function a_admin_can_create_a_new_course()
	{
		$this->adminSignIn();

		$course = $this->createNewCourse();

		$this->assertDatabaseHas('courses', [
			'name' => $course->name
		]);

		Storage::disk('s3')->assertExists("local/courses/images/{$course->image->hashName()}");
		Storage::disk('s3')->assertExists("local/courses/videos/{$course->video->hashName()}");
	}

	/** @test */
	public function a_admin_can_edit_a_course()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->json('PATCH', route('admin.courses.update', ['courseId' => $course->id]), [
			'key' => 'description',
			'value' => 'New description'
		]);

		$this->assertEquals('New description', $course->fresh()->description);
	}

	/** @test */
	public function a_admin_can_change_the_teachers_of_a_course()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();
		$teachers = [create('App\Teacher')->id, create('App\Teacher')->id];
		
		$this->json('PATCH', route('admin.courses.teachers.update', ['courseId' => $course->id]), [
			'value' => $teachers
		])->assertSuccessful();

		$this->assertCount(2, $course->fresh()->teachers);
	}

	/** @test */
	public function the_course_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$oldImage = $courseRequest->image;

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/courses/images/{$oldImage->hashName()}");

		$this->json('PATCH', route('admin.courses.image.update', $course->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/courses/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/courses/images/{$newImage->hashName()}");
	}

	/** @test */
	public function the_course_preview_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$oldVideo = $courseRequest->video;

		$newVideo = UploadedFile::fake()->image('newVideo.jpg');

		Storage::disk('s3')->assertExists("local/courses/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.courses.video.update', $course->slug), [
			'video' => $newVideo
		]);

		Storage::disk('s3')->assertMissing("local/courses/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/courses/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function a_admin_can_remove_a_course()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->delete(route('admin.courses.destroy', $course->slug))->assertSessionHas('status');

		$this->assertDatabaseMissing('courses', [
			'name' => $course->name
		]);
	}

	/** @test */
	public function the_course_chapters_and_all_its_contents_are_removed_when_the_course_is_deleted()
	{
		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewLecture($course, $chapter);

		$this->assertDatabaseHas('chapters', [
			'id' => $chapter->id
		]);

		$this->assertDatabaseHas('lectures', [
			'type' => 'lecture'
		]);

		$this->delete(route('admin.courses.destroy', $course->slug));

		$this->assertDatabaseMissing('chapters', [
			'id' => $chapter->id
		]);

		$this->assertDatabaseMissing('lectures', [
			'type' => 'lecture'
		]);
	}

	/** @test */
	public function the_course_image_and_preview_video_are_removed_when_the_course_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewcourse();

		$course = course::where('name', $request->name)->first();

		$this->delete(route('admin.courses.destroy', $course->slug));

		Storage::disk('s3')->assertMissing($course->image_path);
		Storage::disk('s3')->assertMissing($course->video_path);
	}
}
