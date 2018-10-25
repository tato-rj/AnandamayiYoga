<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	protected $defaultRedirectTo = '/office';

    public function __construct()
    {
        $this->middleware('guest:manager');
    }

	public function showLoginForm()
	{
		return view('admin/auth/login');
	}

	public function login(Request $request)
	{
		$validator = \Validator::make($request->all(), [
				'email' => 'required|email',
				'password' => 'required'
			]);

        if ($validator->fails()) {
            return back()
	            ->withInput($request->only('email', 'remember'))
	            ->withErrors($validator);
        }

		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];

		if (\Auth::guard('manager')->attempt($credentials, $request->remember)) {
			return redirect()->intended('/office');
		}

		return $this->sendFailedLoginResponse($request);
	}

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->to(route('manager.login.show'))
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => \Lang::get('auth.failed'),
            ]);
    }
}
