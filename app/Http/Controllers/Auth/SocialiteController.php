<?php

namespace App\Http\Controllers\Auth;

use App\Providers\Auth\AuthenticateUserListener;
use App\Providers\Auth\AuthenticateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialiteController extends Controller implements AuthenticateUserListener
{
    public function login($provider, AuthenticateUser $authenticateUser, Request $request)
    {
    	$code = ($request->has('code')) ? $request->has('code') : $request->has('oauth_token');

    	return $authenticateUser->execute($provider, $code, $this);
    }

    public function userHasLoggedIn($user)
    {
    	return redirect('/me#');
    }
}
