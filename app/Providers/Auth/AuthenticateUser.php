<?php

namespace App\Providers\Auth;

use App\Http\Controllers\UsersController;
use Illuminate\Contracts\Auth\Guard as Authenticator;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Providers\Auth\AuthenticateUserListener;

class AuthenticateUser
{
	private $users, $socialite, $auth;

	public function __construct(UsersController $users, Socialite $socialite, Authenticator $auth)
	{
		$this->users = $users;
		$this->socialite = $socialite;
		$this->auth = $auth;
	}

	public function execute($provider, $hasCode, AuthenticateUserListener $listener)
	{
		if (! $hasCode)
			return $this->getAuthorizationFirst($provider);
				
		$user = $this->users->findOrCreate($this->getUser($provider));

		$this->auth->login($user, true);

		return $listener->userHasLoggedIn($user);
	}

	public function getUser($provider)
	{
		return $this->socialite->with($provider)->user();
	}

	public function getAuthorizationFirst($provider)
	{
	   	return $this->socialite->with($provider)->redirect();
	}
}
