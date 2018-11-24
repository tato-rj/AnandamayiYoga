<?php

namespace App;

use App\Traits\{FindBySlug, InteractsWithCloud, Localizable};
use Carbon\Carbon;

class Article extends Anandamayi
{
	use FindBySlug, InteractsWithCloud, Localizable;

    protected $guarded = [];
    protected $casts = ['is_pinned' => 'boolean'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($article) {
            $article->deleteImage();
        });
    }

    public function topic()
    {
        return $this->belongsTo(ArticleTopic::class);
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
        return $query->where('topic_id', $topic)->orderBy('is_pinned', 'DESC');
    }

    public function similar()
    {
        return Article::where('topic_id', $this->topic_id)->except($this->id);
    }
}
