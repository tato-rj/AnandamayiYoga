<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\Administrator;
use App\Asana;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AsanaTest extends AppTest
{
	use Administrator;

	/** @test */
	public function a_admin_can_create_a_new_asana()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->assertDatabaseHas('asanas', [
			'name' => $asana->name
		]);

		Storage::disk('s3')->assertExists("local/asanas/images/{$request->image->hashName()}");
		Storage::disk('s3')->assertExists("local/asanas/videos/{$request->video->hashName()}");

		$this->assertCount(2, $asana->benefits);
		$this->assertCount(3, $asana->steps);
		$this->assertCount(4, $asana->types);
		$this->assertCount(2, $asana->subtypes);
	}

	/** @test */
	public function the_same_asana_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$asana = $this->createNewAsana();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.asanas.store', $asana->toArray()))
			 ->assertSessionHas('status');
	}

	/** @test */
	public function a_admin_can_edit_an_asana()
	{
		$this->adminSignIn();

		$asana = create('App\Asana');

		$this->json('PATCH', route('admin.asanas.update', $asana->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();

		$this->assertDatabaseHas('asanas', [
			'slug' => str_slug('new name'),
			'name' => 'new name'
		]);
	}

	/** @test */
	public function a_admin_can_update_the_asana_types()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.asanas.update-type', $asana->id), [
			'key' => 'types',
			'value' => create('App\AsanaType')
		])->assertSuccessful();

		$this->assertCount(1, $asana->fresh()->types);
	}

	/** @test */
	public function a_admin_can_update_the_asana_subtypes()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.asanas.update-subtype', $asana->id), [
			'key' => 'subtypes',
			'value' => create('App\AsanaSubType')
		])->assertSuccessful();

		$this->assertCount(1, $asana->fresh()->subtypes);
	}

	/** @test */
	public function a_admin_can_update_the_asana_benefits()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.asanas.benefits.update', $asana->id), [
			'key' => 'benefits',
			'value' => ['First benefit', 'Second benefit']
		])->assertSuccessful();

		$this->assertCount(2, $asana->fresh()->benefits);
	}

	/** @test */
	public function a_admin_can_update_the_asana_steps()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.asanas.steps.update', $asana->id), [
			'key' => 'steps',
			'value' => ['First step', 'Second step', 'Third step']
		])->assertSuccessful();

		$this->assertCount(3, $asana->fresh()->steps);
	}

	/** @test */
	public function a_admin_can_update_the_asana_levels()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->json('PATCH', route('admin.asanas.levels.update', $asana->id), [
			'key' => 'levels',
			'value' => create('App\Level')
		])->assertSuccessful();

		$this->assertCount(1, $asana->fresh()->levels);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$asanaRequest = $this->createNewAsana();

		$oldImage = $asanaRequest->image;

		$createdAsana = Asana::where('name', $asanaRequest->name)->first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/asanas/images/{$oldImage->hashName()}");

		$this->json('PATCH', route('admin.asanas.image.update', $createdAsana->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/asanas/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/asanas/images/{$newImage->hashName()}");
	}

	/** @test */
	public function the_video_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$asanaRequest = $this->createNewAsana();

		$oldVideo = $asanaRequest->video;

		$createdAsana = Asana::where('name', $asanaRequest->name)->first();

		$newVideo = UploadedFile::fake()->image('newVideo.mp4');

		Storage::disk('s3')->assertExists("local/asanas/videos/{$oldVideo->hashName()}");

		$this->json('PATCH', route('admin.asanas.video.update', $createdAsana->slug), [
			'video' => $newVideo
		]);

		Storage::disk('s3')->assertMissing("local/asanas/videos/{$oldVideo->hashName()}");
		Storage::disk('s3')->assertExists("local/asanas/videos/{$newVideo->hashName()}");
	}

	/** @test */
	public function a_admin_can_remove_an_asana()
	{
		$this->adminSignIn();

		$asana = create('App\Asana');

		$this->delete(route('admin.asanas.destroy', $asana->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asanas', [
			'name' => $asana->name
		]);
	}

	/** @test */
	public function the_asana_types_relationship_is_removed_when_the_asana_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->assertDatabaseHas('asana_asana_type', [
			'asana_id' => $asana->id
		]);

		$this->delete(route('admin.asanas.destroy', $asana->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_asana_type', [
			'asana_id' => $asana->id
		]);
	}

	/** @test */
	public function the_asana_levels_relationship_is_removed_when_the_asana_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->assertDatabaseHas('asana_level', [
			'asana_id' => $asana->id
		]);

		$this->delete(route('admin.asanas.destroy', $asana->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('asana_level', [
			'asana_id' => $asana->id
		]);
	}

	/** @test */
	public function the_asana_image_and_video_are_removed_when_the_asana_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$this->delete(route('admin.asanas.destroy', $asana->slug))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($asana->image_path);
		Storage::disk('s3')->assertMissing($asana->video_path);
	}

	/** @test */
	public function when_an_asana_is_deleted_its_favorite_relatioship_with_a_user_is_also_removed()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();

		$asanaId = $asana->id;

		$this->logout();
		$this->register();

		$this->post(route('user.favorite.store'), [
			'favorited_id' => $asanaId,
			'favorited_type' => get_class($asana)
		]);

		$this->delete(route('admin.asanas.destroy', $asana->slug));

		$this->assertDatabaseMissing('favorites', [
			'favorited_id' => $asanaId
		]);
	}

	/** @test */
	public function when_an_asana_is_deleted_its_benefits_are_also_removed()
	{
		$this->adminSignIn();

		$request = $this->createNewAsana();

		$asana = Asana::where('name', $request->name)->first();
		$asanaId = $asana->id;

		$this->delete(route('admin.asanas.destroy', $asana->slug));

		$this->assertDatabaseMissing('asana_benefits', [
			'asana_id' => $asanaId
		]);
	}
}
