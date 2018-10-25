<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use App\Wallpaper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class WallpaperTest extends AppTest
{
	/** @test */
	public function a_manager_can_see_all_walpapers_from_a_category()
	{
	 	$this->managerSignIn();

	 	$wallpaper = create('App\Wallpaper');

	 	$this->get(route('admin.wallpapers.create', ['category' => $wallpaper->category->id]))
	 		 ->assertSee($wallpaper->category->name);
	}

	/** @test */
	public function a_manager_can_upload_a_wallpaper()
	{
		$this->managerSignIn();

		Storage::fake('s3');

		$request = make('App\Wallpaper');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->json('POST', route('admin.wallpapers.store'), [
			'image' => $request->image,
			'category_id' => $request->category_id
		])->assertSuccessful();

		$wallpaper = Wallpaper::first();

		$this->assertDatabaseHas('wallpapers', [
			'image_path' => $wallpaper->image_path
		]);

		Storage::disk('s3')->assertExists($wallpaper->image_path);
	}

	/** @test */
	public function a_thumbnail_is_automatically_generated_when_the_image_is_uploaded()
	{
		$this->managerSignIn();

		Storage::fake('s3');

		$request = make('App\Wallpaper');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->json('POST', route('admin.wallpapers.store'), [
			'image' => $request->image,
			'category_id' => $request->category_id
		])->assertSuccessful();

		$wallpaper = Wallpaper::first();

		Storage::disk('s3')->assertExists($wallpaper->thumbnail);	 
	}

	/** @test */
	public function a_manager_can_delete_a_wallpaper()
	{
		$this->managerSignIn();

		Storage::fake('s3');

		$request = make('App\Wallpaper');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->json('POST', route('admin.wallpapers.store'), [
			'image' => $request->image,
			'category_id' => $request->category_id
		]);

		$wallpaper = Wallpaper::first();

		$this->json('DELETE', route('admin.wallpapers.destroy', $wallpaper->id));

		$this->assertDatabaseMissing('wallpapers', [
			'image_path' => $wallpaper->image_path
		]);

		Storage::disk('s3')->assertMissing($wallpaper->image_path);
		Storage::disk('s3')->assertMissing($wallpaper->thumbnail);
	}
}
