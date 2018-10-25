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
		Route::post('/enter', function (){
			if (self::isAdmin()) {
				self::authorize();
				
				return back();
			} else {
				return back()->with('denied', 'Ops, wrong password!');
			}
		});		
	}

	protected static function exit()
	{
		Route::get('/exit', function() {
			self::unAuthorize();
			return redirect()->route('home');
		});		
	}

	protected static function isAdmin()
	{
		return request()->gatepass == self::PASS;
	}

	protected static function unAuthorize()
	{
		session()->pull('gate');			
	}

	protected static function authorize()
	{
		session()->put('gate', 'authorized');
				
	}
}
