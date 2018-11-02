<?php

namespace App;

use App\Traits\Filterable;

class Discussion extends Anandamayi
{
    use Filterable;
    
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($discussion) {
            $discussion->replies()->delete();
        });
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }
}
