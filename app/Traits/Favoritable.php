<?php

namespace App\Traits;

use App\Favorite;

trait Favoritable
{
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function isFavorited()
    {
        if (! auth()->check())
            return false;
        
    	return Favorite::where([
    		'user_id' => auth()->user()->id,
    		'favorited_id' => $this->id,
    		'favorited_type' => get_class($this)
    	])->exists();
    }

    public function favorited()
    {
        return Favorite::where([
            ['favorited_id', '=', $this->id],
            ['favorited_type', '=', get_class($this)]
        ]);
    }
}
