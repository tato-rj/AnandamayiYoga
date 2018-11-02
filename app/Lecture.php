<?php

namespace App;

use App\Traits\{InteractsWithCloud, Completable};

class Lecture extends Anandamayi
{
	use InteractsWithCloud, Completable;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($lesson) {
            $lesson->deleteVideo();
        });
    }

    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }

    public function getClassNameAttribute()
    {
        return 'lecture';
    }
}
