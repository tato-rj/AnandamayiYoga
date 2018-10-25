<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{FindBySlug, InteractsWithCloud};
use Carbon\Carbon;

class Article extends Model
{
	use FindBySlug, InteractsWithCloud;

    protected $guarded = [];

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

    public function getPathAttribute()
    {
    	return "/reads/articles/{$this->slug}";
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

    public function scopeLearningAboutYoga($query)
    {
        return [
            'Yoga basics' => [
                'What is Yoga?',
                'History of Yoga',
                'The benefits of Yoga practice',
                'Asanas: the Yoga Postures',
                'Mudras: the Yoga spiritual gestures',
                'Pranayamas: the Yoga breathing exercises'
            ],
            'Yoga Philosophy' => [
                'The Eight Limbs of Yoga',
                'The Bhagavad Gita',
                'The Kundalini Energy',
                'The Seven Chakaras',
                'The Five Koshas',
                'The Hatha Yoga Pradipika'
            ],
            'Yoga Therapy' => [
                'Stress',
                'Chronic pain',
                'Depression and Anxiety',
                'Detoxification',
                'Eating disorders',
                'Inflammation',
                'Insomnia',
                'Osteoporosis'
            ],
            'Shatkarma: the six purification techniques' => [
                'Netī',
                'Dhautī',
                'Naulī',
                'Basti',
                'Kapālabhātī',
                'Trāṭaka'
            ]
        ];
    }
}
