<?php

namespace App;

use App\Traits\{FindBySlug, Favoritable, InteractsWithCloud, Localizable, HasTeacher};
use Illuminate\Support\Facades\Storage;

class Program extends Anandamayi
{
    use FindBySlug, Favoritable, InteractsWithCloud, Localizable, HasTeacher;
    
    protected $guarded = [];

    protected $with = ['categories'];
    protected $appends = ['is_free'];
    protected $withCount = ['lessons'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($program) {
            $program->deleteImage();
            $program->deleteVideo();
            $program->categories()->detach();
            $program->lessons()->each(function($lesson) {
                $lesson->program_id = null;
                $lesson->save();
            });
            $program->favorited()->delete();
        });
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->valid()->orderBy('order');
    }

    public function syncLessons($newLessons)
    {
        $this->lessons->each(function($lesson) use ($newLessons) {
            if (! in_array($lesson->id, $newLessons))
                $lesson->program()->dissociate()->save();
        });

        return $this->lessons()->saveMany(Lesson::findMany($newLessons));
    }

    public function path()
    {
        return route('discover.programs.show', $this->slug);
    }

    public function lessonPath($lesson)
    {
        return route('discover.programs.lesson', [$this->slug, $lesson->slug]);
    }

    public function scopeRecommendedFor($query, User $user)
    {
    	$userPreferences = $user->categories->pluck('id')->toArray();

    	return $query->whereHas('categories', function($q) use($userPreferences){
    		$q->whereIn('id', $userPreferences);
    	});
    }

    public function getDurationAttribute()
    {
        return $this->lessons()->pluck('duration')->sum();
    }

    public function progress()
    {
        if (! auth()->check())
            return false;

        $completedLessons = auth()->user()->completedLessons->unique()->where('program_id', $this->id)->count();

        return percentage(
            $this->lessons()->count(),
            $completedLessons
        );
    }

    public function isCompleted()
    {
        if (!auth()->check())
            return false;

        return $this->progress() == 100;
    }

    public function lessonLeftOff()
    {
        $programLessons = $this->lessons;
        $userCompletedLessonsFromThisProgram = auth()->user()->completedLessons->where('program_id', $this->id);

        return $programLessons->diff($userCompletedLessonsFromThisProgram)->first();
    }

    public function getIsFreeAttribute()
    {
        return ! $this->lessons->pluck('is_free')->contains(false);
    }

    public function scopeFree($query, $count = null)
    {
        $programs = $query->inRandomOrder()->get();

        $programs->each(function($program, $key) use ($programs) {
            if (! $program->is_free)
                $programs->forget($key);
        });

        return $programs->take($count);
    }
}
