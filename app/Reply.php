<?php

namespace App;

class Reply extends Anandamayi
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
