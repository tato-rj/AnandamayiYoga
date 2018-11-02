<?php

namespace App;

use App\Traits\{InteractsWithCloud, Filterable};

class Wallpaper extends Anandamayi
{
	use InteractsWithCloud, Filterable;

    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(WallpaperCategory::class);
    }
}
