<?php

namespace App\Traits;

use App\User;

trait Completable
{
    protected $tablename = 'completables';

    public function users()
    {
        return $this->morphToMany(User::class, 'completable');
    }

    public function isCompletedBy($user)
    {        
    	return $this->users()->find($user->id)->exists();
    }

    // public function favorited()
    // {
    //     return Favorite::where([
    //         ['favorited_id', '=', $this->id],
    //         ['favorited_type', '=', get_class($this)]
    //     ]);
    // }
}
