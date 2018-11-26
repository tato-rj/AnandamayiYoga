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

	/** @test */
	public function unauthenticated_users_cannot_view_an_asana_details_page()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
		
		$asana = create('App\Asana');

		$this->get(route('discover.asanas.show', $asana->slug));
	}
}
