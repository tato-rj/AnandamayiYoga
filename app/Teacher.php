<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{FindBySlug, InteractsWithCloud};
use Illuminate\Notifications\Notifiable;

class Teacher extends Model
{
	use FindBySlug, InteractsWithCloud, Notifiable;

    protected $guarded = [];

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
        return $this->hasMany(Lesson::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function categoriesIds()
    {
        return $this->categories->pluck('id');
    }
}
