<?php

namespace App;

use App\Traits\{FindBySlug, Localizable};

class ArticleTopic extends Anandamayi
{
	use FindBySlug, Localizable;
	
    protected static function boot()
    {
        parent::boot();

        self::deleting(function($topic) {
            $topic->articles()->delete();
        });
    }

    public function articles()
    {
    	return $this->belongsToMany(Article::class, 'article_article_topic', 'article_id', 'topic_id');
    }
}
