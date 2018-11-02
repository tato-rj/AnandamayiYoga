<?php

namespace Tests\Traits;

trait WorkWithRoutes
{
	protected $exceptions = ['goodbye', 'login', 'admin/login', 'admin', 'admin/statistics', 'password/reset', 'register/confirm'];
	protected $allAuthMiddlewares = ['auth:api', 'auth:admin', 'auth:admin-api','auth'];
	protected $userAuthMiddlewares = ['auth:api', 'auth'];
	protected $adminAuthMiddlewares = ['auth:api', 'auth:admin', 'auth:admin-api'];
	
	public function getRoutes($except, $only = '/')
	{
		$pages = \Route::getRoutes();

		$guestPages = [];

		foreach ($pages as $page) {
			if (array_intersect($except, $page->middleware()) == false
				&& in_array('GET', $page->methods) 
				&& strpos($page->uri, '{') == false
				&& strpos($page->uri, $only) !== false
				&& ! in_array($page->uri, $this->exceptions))
				array_push($guestPages, $page);
		}

		return $guestPages;
	}

	public function check($page)
	{
		if (array_key_exists('as', $page->action)) {
			$response = $this->get(route($page->action['as']));

			! empty($response->exception) ? 
				abort(403, $response->exception->getMessage())
				: $response->assertSuccessful();
		}
	}
}
