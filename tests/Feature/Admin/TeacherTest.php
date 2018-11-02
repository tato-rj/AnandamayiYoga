<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\Administrator;
use App\{Course, Teacher};
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class TeacherTest extends AppTest
{
	use Administrator;

	/** @test */
	public function a_admin_can_create_a_new_teacher()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$this->assertDatabaseHas('teachers', [
			'email' => $teacher->email
		]);

		Storage::disk('s3')->assertExists("local/teachers/images/{$teacherRequest->image->hashName()}");
	}

	/** @test */
	public function the_same_teacher_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$teacher = $this->createNewTeacher();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.teachers.store', $teacher->toArray()));
	}

	/** @test */
	public function a_admin_can_edit_a_teacher()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$this->json('PATCH', route('admin.teachers.update', $teacher->id), [
			'key' => 'name',
			'value' => 'FakeName'
		])->assertSuccessful();

		$this->assertDatabaseHas('teachers', [
			'name' => 'FakeName'
		]);
	}

	/** @test */
	public function a_admin_can_update_the_teachers_categories()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$this->json('PATCH', route('admin.teachers.categories.update', $teacher->slug), [
			'key' => 'category',
			'value' => create('App\Category')
		])->assertSuccessful();

		$this->assertCount(1, $teacher->fresh()->categories);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$oldImage = $teacherRequest->image;

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/teachers/images/{$oldImage->hashName()}");

		$this->patch(route('admin.teachers.image.update', $teacher->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/teachers/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/teachers/images/{$newImage->hashName()}");
	}

	/** @test */
	public function a_admin_can_remove_a_teacher()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$this->delete(route('admin.teachers.destroy', $teacher->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('teachers', [
			'email' => $teacher->email
		]);
	}

	/** @test */
	public function the_teachers_image_is_removed_when_the_teacher_is_deleted()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$this->delete(route('admin.teachers.destroy', $teacher->slug));

		Storage::disk('s3')->assertMissing($teacher->image_path);
	}

	/** @test */
	public function the_teachers_courses_are_removed_when_the_teacher_is_deleted()
	{
		$this->adminSignIn();

		$teacherRequest = $this->createNewTeacher();

		$teacher = Teacher::where('email', $teacherRequest->email)->first();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();
		
		$course->teachers()->save($teacher);

		$this->delete(route('admin.teachers.destroy', $teacher->slug));

		$this->assertDatabaseMissing('course_teacher', [
			'course_id' => $course->id,
			'teacher_id' => $teacher->id
		]);

		$this->assertDatabaseMissing('courses', [
			'id' => $course->id
		]);
	}

	/** @test */
	public function the_teachers_lessons_are_removed_when_the_teacher_is_deleted()
	{
		$this->adminSignIn();

		$lesson = $this->createNewLesson();

		$lesson->teacher->delete();

		$this->assertDatabaseMissing('lessons', ['name' => $lesson->name]);
	}

	/** @test */
	public function the_teachers_programs_are_removed_when_the_teacher_is_deleted()
	{
		$this->adminSignIn();

		$program = $this->createNewProgram();

		$program->teacher->delete();

		$this->assertDatabaseMissing('programs', ['name' => $program->name]);
	}
}
