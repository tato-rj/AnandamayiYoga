<?php

namespace Tests\Feature;

use Tests\AppTest;

class FavoritesTest extends AppTest
{
	/** @test */
	public function a_user_can_favorite_any_lesson()
	{
		$this->register();

		$lesson = create('App\Lesson');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $lesson->id,
			'favorited_type' => get_class($lesson)
		]);

		$this->assertCount(1, $lesson->favorites);
	}

	/** @test */
	public function a_user_can_favorite_any_asana()
	{
		$this->register();

		$asana = create('App\Asana');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $asana->id,
			'favorited_type' => get_class($asana)
		]);

		$this->assertCount(1, $asana->favorites);
	}

	/** @test */
	public function a_user_can_unfavorite_a_lesson()
	{
		$this->register();

		$lesson = create('App\Lesson');
		
		$this->delete(route('user.favorite.store'), [
			'favorited_id' => $lesson->id,
			'favorited_type' => get_class($lesson)
		]);

		$this->assertCount(0, $lesson->favorites);
	}

	/** @test */
	public function a_guest_cannot_favorite_a_lesson()
	{
		$this->withExceptionHandling();
		
		$lesson = create('App\Lesson');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $lesson->id,
			'favorited_type' => get_class($lesson)
		])->assertRedirect(route('login'));
	}

	/** @test */
	public function a_user_cannot_favorite_the_same_lesson_twice()
	{
		$this->register();

		$lesson = create('App\Lesson');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $lesson->id,
			'favorited_type' => get_class($lesson)
		]);
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $lesson->id,
			'favorited_type' => get_class($lesson)
		]);

		$this->assertCount(1, $lesson->favorites);
	}

	/** @test */
	public function a_user_can_favorite_any_program()
	{
		$this->register();

		$program = create('App\Program');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $program->id,
			'favorited_type' => get_class($program)
		]);

		$this->assertCount(1, $program->favorites);
	}

	/** @test */
	public function a_user_can_unfavorite_a_program()
	{
		$this->register();

		$program = create('App\Program');
		
		$this->delete(route('user.favorite.store'), [
			'favorited_id' => $program->id,
			'favorited_type' => get_class($program)
		]);

		$this->assertCount(0, $program->favorites);
	}

	/** @test */
	public function a_guest_cannot_favorite_a_program()
	{
		$this->withExceptionHandling();
		
		$program = create('App\Program');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $program->id,
			'favorited_type' => get_class($program)
		])->assertRedirect(route('login'));
	}

	/** @test */
	public function a_user_cannot_favorite_the_same_program_twice()
	{
		$this->register();

		$program = create('App\Program');
		
		$this->post(route('user.favorite.store'), [
			'favorited_id' => $program->id,
			'favorited_type' => get_class($program)
		]);

		$this->post(route('user.favorite.store'), [
			'favorited_id' => $program->id,
			'favorited_type' => get_class($program)
		]);

		$this->assertCount(1, $program->favorites);
	}
}
