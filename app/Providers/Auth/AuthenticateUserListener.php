<?php

namespace App\Providers\Auth;

interface AuthenticateUserListener
{
	public function userHasLoggedIn($user);
}
