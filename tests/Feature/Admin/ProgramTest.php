<?php

namespace Tests\Feature\Admin;

use App\Program;
use Tests\AppTest;
use Tests\Traits\Administrator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProgramTest extends AppTest
{
	use Administrator;

	/** @test */
	public function a_admin_can_create_a_new_program()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$this->assertDatabaseHas('programs', [
			'name' => $program->name
		]);

		Storage::disk('s3')->assertExists($program->image_path);
		Storage::disk('s3')->assertExists($program->video_path);

		$this->assertCount(4, $program->categories);

		$this->assertCount(2, $program->lessons);
	}

	/** @test */
	public function a_program_can_be_assigned_to_a_teacher_when_created()
	{
		$this->adminSignIn();

		$program = $this->createNewProgram();

		$this->assertInstanceOf('App\Teacher', $program->teacher);		 
	}

	/** @test */
	public function the_same_program_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$program = $this->createNewProgram();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.programs.store', $program->toArray()))
			 ->assertSessionHas('status');
	}

	/** @test */
	public function a_admin_can_edit_a_program()
	{
		$this->adminSignIn();

		$program = create('App\Program');

		$this->json('PATCH', route('admin.programs.update', $program->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('programs', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function a_admin_can_update_the_program_categories()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.programs.categories.update', $program->id), [
			'key' => 'category',
			'value' => create('App\Category')
		])->assertSuccessful();

		$this->assertCount(1, $program->fresh()->categories);
	}

	/** @test */
	public function a_admin_can_update_the_program_lessons()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$this->assertCount(2, $program->fresh()->lessons);

		$this->json('PATCH', route('admin.programs.lessons.update', $program->id), [
			'key' => 'lessons',
			'value' => create('App\Lesson', ['name' => 'new lesson'])
		])->assertSuccessful();
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$programRequest = $this->createNewProgram();

		$oldImage = $programRequest->image;

		$createdProgram = Program::where('name', $programRequest->name)->first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/programs/images/{$oldImage->hashName()}");

		$this->json('PATCH', route('admin.programs.image.update', $createdProgram->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/programs/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/programs/images/{$newImage->hashName()}");
	}

	/** @test */
	public function the_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$programRequest = $this->createNewProgram();

		$oldVideo = $programRequest->video;

		$createdProgram = Program::where('name', $programRequest->name)->first();

		$newVideo = UploadedFile::fake()->image('newVideo.jpg');

		Storage::disk('s3')->assertExists("local/programs/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.programs.video.update', $createdProgram->slug), [
			'video' => $newVideo
		]);

		Storage::disk('s3')->assertMissing("local/programs/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/programs/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function a_admin_can_remove_a_program()
	{
		$this->adminSignIn();

		$program = create('App\Program');

		$this->delete(route('admin.programs.destroy', $program->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('programs', [
			'name' => $program->name
		]);
	}

	/** @test */
	public function the_program_categories_relationship_is_removed_when_the_program_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$this->assertDatabaseHas('category_program', [
			'program_id' => $program->id
		]);

		$this->delete(route('admin.programs.destroy', $program->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('category_program', [
			'program_id' => $program->id
		]);
	}

	/** @test */
	public function the_program_image_and_video_are_removed_when_the_program_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$this->delete(route('admin.programs.destroy', $program->slug))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($program->image_path);
		Storage::disk('s3')->assertMissing($program->video_path);
	}

	/** @test */
	public function the_program_lessons_are_updated_when_the_program_is_deleted()
	{
		$this->adminSignIn();
		
		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$lesson = $program->lessons->first();

		$this->delete(route('admin.programs.destroy', $program->slug))
			 ->assertSessionHas('status');

		$this->assertNull($lesson->fresh()->program_id);
	}

	/** @test */
	public function when_a_program_is_deleted_its_favorite_relatioship_with_a_user_is_also_removed()
	{
		$this->adminSignIn();

		$request = $this->createNewProgram();

		$program = Program::where('name', $request->name)->first();

		$programId = $program->id;

		$this->logout();
		$this->register();

		$this->post(route('user.favorite.store'), [
			'favorited_id' => $programId,
			'favorited_type' => get_class($program)
		]);

		$this->delete(route('admin.programs.destroy', $program->slug));

		$this->assertDatabaseMissing('favorites', [
			'favorited_id' => $programId
		]);
	}
}
