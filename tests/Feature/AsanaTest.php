<?php

namespace Tests\Feature;

use Tests\AppTest;

class AsanaTest extends AppTest
{
	/** @test */
	public function a_guest_can_browse_through_all_asanas_on_the_discover_page()
	{
		$asana = create('App\Asana', ['name' => 'Great asana']);

		$this->get(route('discover.asanas.index'))->assertSee('Great asana'); 
	}
}
