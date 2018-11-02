<?php

namespace App;

use App\Traits\FindBySlug;

class ArticleTopic extends Anandamayi
{
	use FindBySlug;
	
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($topic) {
            $topic->articles()->detach();
        });
    }

    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }
}
