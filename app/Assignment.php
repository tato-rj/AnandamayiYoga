<?php

namespace App;

use App\Traits\Completable;

class Assignment extends Anandamayi
{
    use Completable;
    
    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }

    public function answers()
    {
    	return $this->morphMany(Answer::class, 'answerable');
    }

    public function getTypeAttribute()
    {
    	return 'assignment';
    }

    public function getClassNameAttribute()
    {
        return 'assignment';
    }
}
