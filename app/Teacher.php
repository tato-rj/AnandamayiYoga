<?php

namespace App;

use App\Traits\{FindBySlug, InteractsWithCloud, Localizable};
use Illuminate\Notifications\Notifiable;

class Teacher extends Anandamayi
{
	use FindBySlug, InteractsWithCloud, Localizable, Notifiable;

    protected $guarded = [];
    protected $withCount = ['lessons', 'programs', 'courses'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($teacher) {
            $teacher->deleteImage();
            $teacher->deleteCover();
            $teacher->courses->each->delete();
            $teacher->courses()->detach();
            $teacher->lessons->each->delete();
            $teacher->programs->each->delete();
            $teacher->questionaire()->delete();
        });
    }

    public function courses()
    {
    	return $this->belongsToMany(Course::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->valid()->published();
    }

    public function programs()
    {
        return $this->hasMany(Program::class)->published();
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function questionaire()
    {
        return $this->hasOne(TeacherQuestionaire::class);
    }

    public function routines()
    {
        return Routine::whereHas('questionaire', function($query) {
            $query->where('teacher_id', $this->id);
        })->get();
    }

    public function categoriesIds()
    {
        return $this->categories->pluck('id');
    }

    public function scopeAnandamayi($query)
    {
        return $query->where('name', 'LIKE', '%Anandamayi%')->first();
    }

    public function scopeHasPublishedQuestionaires($query)
    {
        return $query->whereHas('questionaire', function($q) {
            $q->published();
        });
    }
}
