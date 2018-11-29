<?php

namespace App;

use App\Traits\InteractsWithCloud;

class Book extends Anandamayi
{
    use InteractsWithCloud;

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($asana) {
            $asana->deleteImage();
        });
    }
}
