<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;

class GateController
{
	const PASS = 'aliceyoga';

	public static function auth()
	{
		self::enter();
		self::exit();
	}

	protected static function enter()
	{
		Route::post('/enter', 'Auth\GateController@open');		
	}

	public function open()
	{
		if ($this->isAdmin()) {
			$this->authorize();
			
			return back();
		} else {
			return back()->with('denied', 'Ops, wrong password!');
		}
	}

	protected static function exit()
	{
		Route::get('/exit', 'Auth\GateController@close');		
	}

	public function close()
	{
		$this->unAuthorize();
		return redirect()->route('home');		
	}

	public function isAdmin()
	{
		return request()->gatepass == self::PASS;
	}

	public function unAuthorize()
	{
		session()->pull('gate');			
	}

	public function authorize()
	{
		session()->put('gate', 'authorized');
	}
}
