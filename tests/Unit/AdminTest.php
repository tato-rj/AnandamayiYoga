<?php

namespace Tests\Unit;

use Tests\AppTest;

class AdminTest extends AppTest
{
	/** @test */
	public function only_managers_are_allowed_on_the_office_pages()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
		
		$this->get('/admin'); 
	}
}
