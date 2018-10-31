<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\{Lesson, Favorite};
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
	public function index()
	{
		return view('pages/user/dashboard/index', [
			'show' => ['favorites'],
			'limit' => null
		]);
	}

	public function store(Request $request)
	{
		return Favorite::createOrFail($request);
	}

	public function destroy(Request $request)
	{
        return Favorite::where([
        		'user_id' => auth()->user()->id,
                'favorited_id' => $request->favorited_id,
                'favorited_type' => $request->favorited_type
            ])->delete();
	}
}
