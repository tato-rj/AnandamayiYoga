<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Lesson, Favorite};

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
