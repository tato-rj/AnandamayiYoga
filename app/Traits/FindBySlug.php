<?php

namespace App\Traits;

trait FindBySlug
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
