<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\WorkWithRoutes;

class ViewsTest extends AppTest
{
	use WorkWithRoutes;
	
	/** @test */
	public function all_guest_views_are_working()
	{
		$this->withExceptionHandling();
		
		$guestPages = $this->getRoutes($except = $this->allAuthMiddlewares);
		
		foreach ($guestPages as $page) {
			$this->check($page);
		}
	}

	/** @test */
	public function all_user_views_are_working()
	{
		$this->withExceptionHandling();

		$this->register();

		$userPages = $this->getRoutes($except = $this->adminAuthMiddlewares);

		foreach ($userPages as $page) {
			$this->check($page);
		}
	}

	/** @test */
	public function all_admin_views_are_working()
	{
		$this->adminSignIn();

		$adminPages = $this->getRoutes($except = $this->userAuthMiddlewares, $only = 'admin');

		foreach ($adminPages as $page) {
			$this->check($page);
		}
	}
}
