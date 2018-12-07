<?php

namespace App;

use App\Traits\{FindBySlug, Localizable};

class Category extends Anandamayi
{
    use FindBySlug, Localizable;

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
        return $this->belongsToMany(Lesson::class)->published();
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)->published();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
