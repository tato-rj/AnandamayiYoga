<?php

namespace App;

use App\Filters\LessonFilters;
use App\Traits\{FindBySlug, Favoritable, SwiperQueries, InteractsWithCloud, Filterable, Localizable, HasTeacher};

class Lesson extends Anandamayi
{
    use FindBySlug, Favoritable, SwiperQueries, InteractsWithCloud, Filterable, Localizable, HasTeacher;

    protected $guarded = [];
    protected $casts = ['is_free' => 'boolean'];
    protected $with = ['categories'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($lesson) {
            $lesson->deleteImage();
            $lesson->deleteVideo();
            $lesson->categories()->detach();
            $lesson->levels()->detach();
            $lesson->completed()->detach();
            $lesson->favorited()->delete();
            $lesson->schedules()->delete();
        });
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }

    public function hasAllLevels()
    {
        return $this->levels()->count() == 3;
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function completed()
    {
        return $this->belongsToMany(User::class, 'completed_lessons');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function path()
    {
        return route('discover.classes.show', $this->slug);
    }

    public function scopeValid($query)
    {
        return $query->whereNotNull('duration');
    }

    public function categoriesIds()
    {
        return $this->categories->pluck('id');
    }

    public function scopeRecommendedFor($query, User $user)
    {
    	$userPreferences = $user->categories()->pluck('id')->toArray();

        if (!empty($userPreferences)) {
            $query->whereHas('categories', function($q) use($userPreferences){
                $q->whereIn('id', $userPreferences);
            });
        }

        if ($user->level_id) {
            $query->whereHas('levels', function($q) use($user){
                $q->where('id', $user->level_id);
            });
        }

        return $query;
    }

    public function scopeByCategory($query, $category)
    {
        $query->whereHas('categories', function($q) use ($category) {
            return $q->where('slug', $category->slug);
        });
    }
}
