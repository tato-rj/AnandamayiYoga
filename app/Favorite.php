<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = [];

    static function createOrFail($request)
    {
    	$record = [
    		'user_id' => auth()->user()->id,
    		'favorited_id' => $request->favorited_id,
    		'favorited_type' => $request->favorited_type
    	];

    	if (! self::where($record)->exists())
    		return self::create($record);
    }
}
