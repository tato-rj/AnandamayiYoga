<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FindBySlug;

class ArticleTopic extends Model
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
