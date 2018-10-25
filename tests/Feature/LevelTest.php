<?php

namespace Tests\Feature;

use Tests\AppTest;

class LevelTest extends AppTest
{
	/** @test */
	public function a_user_can_update_its_preferred_level()
	{
		$this->register();

		$originalLevel = auth()->user()->level;

		$level = create('App\Level');

		$this->post(route('user.update.level', $level->id));

		$this->assertNotEquals(auth()->user()->fresh()->level, $originalLevel);
	}
}
