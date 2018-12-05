<?php

namespace Tests\Unit;

use Tests\AppTest;

class AdminTest extends AppTest
{
	/** @test */
	public function only_admins_are_allowed_on_the_office_pages()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
		
		$this->get('/admin'); 
	}

	/** @test */
	public function it_knows_if_it_is_a_manager()
	{
		$managerAdmin = create('App\Admin', ['role' => 'manager']);
		$nonManagerAdmin = create('App\Admin', ['role' => 'other']);

		$this->assertTrue($managerAdmin->isManager());		
		$this->assertFalse($nonManagerAdmin->isManager());
	}
}
