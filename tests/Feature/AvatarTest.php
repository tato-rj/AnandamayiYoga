<?php

namespace Tests\Feature;

use Tests\AppTest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AvatarTest extends AppTest
{
	/** @test */
	public function only_members_can_add_avatars()
	{
		$this->withExceptionHandling();

		$this->json('POST', route('user.avatar.store', ['user' => 'slug']))
			 ->assertStatus(401); 
	}

	/** @test */
	public function a_valid_avatar_must_be_provided()
	{
		$this->withExceptionHandling()->register();

		$this->uploadAvatar('not-an-image')->assertStatus(422); 	 
	}

	/** @test */
	public function a_user_can_upload_an_avatar_to_their_profile()
	{
		$this->register();

		Storage::fake('s3');

		$user = auth()->user();

		$file = UploadedFile::fake()->image('avatar.jpg');
		
		$this->uploadAvatar($file);

		Storage::disk('s3')->assertExists("local/avatars/".auth()->user()->id."/{$file->hashName()}");
	}

	/** @test */
	public function an_avatar_is_removed_when_a_user_uploads_a_new_one()
	{
		$this->register();

		Storage::fake('s3');

		$user = auth()->user();

		$file1 = UploadedFile::fake()->image('avatar1.jpg');

		$file2 = UploadedFile::fake()->image('avatar2.jpg');

		$this->uploadAvatar($file1);
		$this->assertEquals(1, count(Storage::disk('s3')->files("local/avatars/{$user->id}/")));

		$this->uploadAvatar($file2);
		$this->assertEquals(1, count(Storage::disk('s3')->files("local/avatars/{$user->id}/")));
	}

	/** @test */
	public function an_avatar_is_deleted_when_its_user_is_deleted()
	{
		$this->register();

		Storage::fake('s3');

		$user = auth()->user();

		$id = $user->id;

		$file = UploadedFile::fake()->image('avatar.jpg');
		
		$filename = $file->hashName();

		$this->uploadAvatar($file);	 

		Storage::disk('s3')->assertExists("local/avatars/{$id}/{$filename}");

		$this->deleteUser();

		Storage::disk('s3')->assertMissing("local/avatars/{$id}/{$filename}");
	}
}
