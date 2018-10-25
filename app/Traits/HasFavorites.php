<?php

namespace App\Traits;

trait HasFavorites
{
    public function favoriteLessons()
    {
        return $this->morphedByMany('App\Lesson', 'favorited', 'favorites')->withTimestamps();
    }

    public function favoritePrograms()
    {
        return $this->morphedByMany('App\Program', 'favorited', 'favorites')->withTimestamps();
    }

    public function favoriteAsanas()
    {
        return $this->morphedByMany('App\Asana', 'favorited', 'favorites')->withTimestamps();
    }
}
