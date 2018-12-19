<?php

namespace App;

use App\Traits\{FindBySlug, InteractsWithCloud, Localizable};
use Carbon\Carbon;

class Article extends Anandamayi
{
	use FindBySlug, InteractsWithCloud, Localizable;

    protected $casts = ['is_pinned' => 'boolean'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($article) {
            $article->deleteImage();
        });
    }

    public function topics()
    {
        return $this->belongsToMany(ArticleTopic::class, 'article_article_topic', 'article_id', 'topic_id');
    }

    public function author()
    {
        return $this->belongsTo(Teacher::class, 'author_id');
    }


    public function preview($length)
    {
        $text = strip_tags($this->content);
        preg_match("/(?:\w+(?:\W+|$)){0,$length}/", $text, $matches);
        return $matches[0].'...';
    }

    public function scopeByTopic($query, $topic)
    {
        return $query->whereHas('topics', function($q) use ($topic) {
            $q->where('slug', $topic);
        })->orderBy('is_pinned', 'DESC');
    }

    public function similar()
    {
        return Article::whereHas('topics', function($query) {
            $query->whereIn('id', $this->topics->pluck('id'));
        })->except($this->id);
    }
}
