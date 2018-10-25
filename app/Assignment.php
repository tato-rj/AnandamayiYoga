<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Completable;

class Assignment extends Model
{
    use Completable;
    
    protected $guarded = [];

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
