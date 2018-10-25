<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{FindBySlug};

class Category extends Model
{
    use FindBySlug;

    protected $guarded = [];
    protected $withCount = ['lessons', 'programs', 'users'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($category) {
            $category->users()->detach();
            $category->lessons()->detach();
            $category->programs()->detach();
        });
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
