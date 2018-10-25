<?php

namespace Tests\Feature\Admin;

use Carbon\Carbon;
use Tests\AppTest;
use Tests\Traits\Admin;
use App\{Course, Chapter, CourseContent};
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ChapterTest extends AppTest
{
	use Admin;

	/** @test */
	public function a_manager_can_create_an_empty_new_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);

		$this->assertCount(1, $course->fresh()->chapters);
	}

	/** @test */
	public function a_course_sets_the_order_of_a_new_chapter_automatically()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter1 = create('App\Chapter', [
			'course_id' => $course->id,
			'created_at' => Carbon::now()->subWeek(),
			'order' => 0
		]);

		$chapter2 = $this->createNewChapter($course);

		$this->assertEquals(1, $chapter2->order);
	}

	/** @test */
	public function a_manager_can_upload_many_supporting_materials_to_a_chapter()
	{
		Storage::fake('s3');

		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);
		$chapter = Chapter::latest()->first();

		$file1 = UploadedFile::fake()->image('file1.pdf');

		$this->json('POST', route('admin.courses.chapters.materials.store', [$course->slug, $chapter->id]), [
			'file' => $file1
		])->assertSuccessful();

		$this->assertEquals('File1', $chapter->fresh()->supportingMaterials->first()->name);

		$this->assertCount(1, $chapter->fresh()->supportingMaterials);

		Storage::disk('s3')->assertExists("local/courses/{$course->slug}/chapters/{$chapter->id}/files/{$file1->hashName()}");

		$file2 = UploadedFile::fake()->image('file2.pdf');

		$this->json('POST', route('admin.courses.chapters.materials.store', [$course->slug, $chapter->id]), [
			'file' => $file2
		])->assertSuccessful();

		$this->assertCount(2, $chapter->fresh()->supportingMaterials);
	}

	/** @test */
	public function a_manager_can_delete_supporting_materials_from_a_chapter()
	{
		Storage::fake('s3');

		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);
		$chapter = Chapter::latest()->first();

		$file = UploadedFile::fake()->image('file.pdf');

		$this->json('POST', route('admin.courses.chapters.materials.store', [$course->slug, $chapter->id]), [
			'file' => $file,
			'name' => 'New file'
		])->assertSuccessful();

		$this->assertCount(1, $chapter->fresh()->supportingMaterials);

		$material = $chapter->supportingMaterials()->first();

		$this->json('DELETE', route('admin.courses.chapters.materials.destroy', [$course->slug, $chapter->id, $material->id]));

		$this->assertCount(0, $chapter->fresh()->supportingMaterials);
	}

	/** @test */
	public function a_manager_can_reorder_the_chapters()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);
		$this->createNewChapter($course);

		$chapters = Chapter::all();

		$this->json('PATCH', route('admin.courses.chapters.update', [$course->slug, $chapters[0]->id]), ['key' => 'order', 'value' => 2]);
		
		$this->json('PATCH', route('admin.courses.chapters.update', [$course->slug, $chapters[1]->id]), ['key' => 'order', 'value' => 3]);

		$this->assertEquals([2, 3], $course->fresh()->chapters()->orderBy('order')->pluck('order')->toArray());
	}

	/** @test */
	public function a_manager_can_edit_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);
		$chapter = Chapter::first();
		
		$this->json('PATCH', route('admin.courses.chapters.update', [$course->slug, $chapter->id]), [
			'key' => 'description',
			'value' => 'New description.'
		])->assertSuccessful();

		$this->assertEquals('New description.', $chapter->fresh()->description);
	}

	/** @test */
	public function a_manager_can_add_a_lecture_to_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$request = $this->createNewLecture($course, $chapter);

		Storage::disk('s3')->assertExists("local/courses/lectures/videos/{$request->video->hashName()}");

		$this->assertCount(1, $chapter->lectures);
	}

	/** @test */
	public function a_manager_can_add_a_demonstration_to_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$request = $this->createNewDemonstration($course, $chapter);

		Storage::disk('s3')->assertExists("local/courses/demonstrations/videos/{$request->video->hashName()}");

		$this->assertCount(1, $chapter->demonstrations);
	}

	/** @test */
	public function a_manager_can_add_an_assignment_to_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewAssignment($course, $chapter);

		$this->assertCount(1, $chapter->assignments);
	}

	/** @test */
	public function a_manager_can_add_a_quiz_to_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$this->createNewChapter($course);
		$chapter = Chapter::latest()->first();

		$this->createNewQuiz($course, $chapter);

		$this->assertCount(1, $chapter->quizzes);
	}

	/** @test */
	public function a_manager_can_update_a_lecture()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewLecture($course, $chapter);

		$lecture = $chapter->lectures->first();

		$this->json('PATCH', route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'lectures', $lecture->id]), [
			'key' => 'name',
			'value' => 'New name'
		])->assertSuccessful();

		$this->assertEquals($chapter->lectures->first()->fresh()->name, 'New name');
	}

	/** @test */
	public function a_manager_can_update_a_demonstration()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewDemonstration($course, $chapter);

		$demonstration = $chapter->demonstrations->first();

		$this->json('PATCH', route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'demonstrations', $demonstration->id]), [
			'key' => 'name',
			'value' => 'New name'
		])->assertSuccessful();

		$this->assertEquals($chapter->demonstrations->first()->fresh()->name, 'New name');
	}

	/** @test */
	public function a_manager_can_update_an_assignment()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewAssignment($course, $chapter);

		$assignment = $chapter->assignments->first();

		$this->json('PATCH', route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'assignments', $assignment->id]), [
			'key' => 'question',
			'value' => 'A new question!'
		])->assertSuccessful();

		$this->assertEquals($assignment->fresh()->question, 'A new question!');
	}

	/** @test */
	public function a_manager_can_update_a_quiz()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewQuiz($course, $chapter);

		$quiz = $chapter->quizzes->first();

		$this->json('PATCH', route('admin.courses.chapters.content.update', [$course->slug, $chapter->id, 'quizzes', $quiz->id]), [
			'key' => 'name',
			'value' => 'New name'
		])->assertSuccessful();

		$this->assertEquals($quiz->fresh()->name, 'New name');
	}

	/** @test */
	public function the_lecture_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$lectureRequest = $this->createNewLecture($course, $chapter);

		$lecture = $chapter->lectures->first();

		$oldVideo = $lectureRequest->video;

		$newVideo = UploadedFile::fake()->image('newVideo.jpg');

		Storage::disk('s3')->assertExists("local/courses/lectures/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.courses.chapters.content.video.update', [$course->slug, $chapter->id, 'lectures', $lecture->id]), [
			'video' => $newVideo,
			'duration' => 200
		]);

		Storage::disk('s3')->assertMissing("local/courses/lectures/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/courses/lectures/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function the_demonstration_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$demonstrationRequest = $this->createNewDemonstration($course, $chapter);

		$demonstration = $chapter->demonstrations->first();

		$oldVideo = $demonstrationRequest->video;

		$newVideo = UploadedFile::fake()->image('newVideo.jpg');

		Storage::disk('s3')->assertExists("local/courses/demonstrations/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.courses.chapters.content.video.update', [$course->slug, $chapter->id, 'demonstrations', $demonstration->id]), [
			'video' => $newVideo, 
			'duration' => 200]);

		Storage::disk('s3')->assertMissing("local/courses/demonstrations/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/courses/demonstrations/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function a_manager_can_delete_a_lecture()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewLecture($course, $chapter);

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'lectures',
			'id' => $chapter->lectures->first()->id
		]));

		$this->assertEmpty($chapter->fresh()->lectures);
	}

	/** @test */
	public function a_manager_can_delete_a_demonstration()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewDemonstration($course, $chapter);

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'demonstrations',
			'id' => $chapter->demonstrations->first()->id
		]));

		$this->assertEmpty($chapter->fresh()->demonstrations);
	}

	/** @test */
	public function the_lecture_video_is_removed_when_the_lecture_is_deleted()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewLecture($course, $chapter);

		$lecture = $chapter->lectures->first();

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'lectures',
			'id' => $chapter->lectures->first()->id
		]));

		Storage::disk('s3')->assertMissing($lecture->video_path);
	}

	/** @test */
	public function the_demonstration_video_is_removed_when_the_demonstration_is_deleted()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->createNewDemonstration($course, $chapter);

		$demonstration = $chapter->demonstrations->first();

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'demonstrations',
			'id' => $chapter->demonstrations->first()->id
		]));

		Storage::disk('s3')->assertMissing($demonstration->video_path);
	}

	/** @test */
	public function a_manager_can_delete_an_assignment()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$assignment = $this->createNewAssignment($course, $chapter);

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'assignments',
			'id' => $assignment->id
		]));

		$this->assertEmpty($chapter->fresh()->assignments);
	}

	/** @test */
	public function a_manager_can_delete_a_quiz()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$quiz = $this->createNewQuiz($course, $chapter);

		$this->delete(route('admin.courses.chapters.content.delete', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'relationship' => 'quizzes',
			'id' => $quiz->id
		]));

		$this->assertEmpty($chapter->fresh()->quizzes);
	}

	/** @test */
	public function a_manager_can_remove_a_chapter()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$this->assertNotEmpty($course->fresh()->chapters);

		$this->delete(route('admin.courses.chapters.destroy', [$course->slug, $chapter->id]))
			 ->assertSessionHas('status');

		$this->assertEmpty($course->fresh()->chapters);
	}

	/** @test */
	public function a_chapters_content_is_removed_when_the_chapter_is_deleted()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter = $this->createNewChapter($course);

		$quiz = $this->createNewQuiz($course, $chapter);

		$this->assertDatabaseHas('quizzes', [
			'id' => $quiz->id
		]);

		$this->delete(route('admin.courses.chapters.destroy', [$course->slug, $chapter->id]));

		$this->assertDatabaseMissing('quizzes', [
			'id' => $quiz->id
		]);
	}

	/** @test */
	public function a_course_automatically_reorders_its_chapters_once_a_chapter_has_been_removed()
	{
		$this->managerSignIn();

		$courseRequest = $this->createNewCourse();
		$course = Course::where('name', $courseRequest->name)->first();

		$chapter1 = create('App\Chapter', [
			'course_id' => $course->id,
			'created_at' => Carbon::now()->subWeek(),
			'order' => 0
		]);

		$chapter2 = $this->createNewChapter($course);

		$this->assertEquals(1, $chapter2->order);

		$this->delete(route('admin.courses.chapters.destroy', [$course->slug, $chapter1->id]));

		$this->assertEquals(0, $chapter2->fresh()->order);
	}
}
