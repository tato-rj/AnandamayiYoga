<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{FindBySlug, InteractsWithCloud};
use Carbon\Carbon;

class Article extends Model
{
	use FindBySlug, InteractsWithCloud;

    protected $guarded = [];
    protected $subjects = ['Yoga Basics', 'Yoga Philosophy'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($article) {
            $article->deleteImage();
            $article->topics()->detach();
        });
    }

    public function topics()
    {
        return $this->belongsToMany(ArticleTopic::class);
    }

    public function author()
    {
        return $this->belongsTo(Teacher::class, 'author_id');
    }

    public function getIsBlogAttribute()
    {
        return ! is_null($this->subject);
    }

    public function scopeSubjects($query)
    {
        return $this->subjects;
    }

    public function preview($length)
    {
        $text = strip_tags($this->content);
        return substr($text, 0, $length).'...';
    }

    public function scopeArchives($query)
    {
        return $query->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                ->groupBy('year', 'month')
                ->orderByRaw('min(created_at) DESC');
    }

    public function scopeFilter($query, $filters)
    {
        if (! empty($filters['month']))
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);

        if (! empty($filters['year']))
            $query->whereYear('created_at', $filters['year']);

        if (! empty($filters['topic'])){
            $query->whereHas('topics', function($q) use ($filters) {
                $q->where('slug', $filters['topic']);
            });
        }
    }

    public function scopeBlog($query)
    {
        return $query->whereNull('subject');
    }

    public function scopeLearning($query)
    {
        return $query->whereNotNull('subject')->orderBy('order');
    }

    public function scopeSubject($query, $subject)
    {
        return $query->where('subject', $subject)->orderBy('order');
    }
}
