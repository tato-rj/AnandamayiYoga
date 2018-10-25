<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
    	return $this->belongsTo(Discussion::class);
    }
}
