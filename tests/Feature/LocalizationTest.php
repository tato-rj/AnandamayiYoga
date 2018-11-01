<?php

namespace Tests\Feature;

use Tests\AppTest;

class LocalizationTest extends AppTest
{
	/** @test */
	public function a_user_can_view_the_site_in_different_languages()
	{
		$this->post(route('localization.set', ['language' => 'new language']));

		$this->assertTrue(session()->has('lang'));
	}
}
