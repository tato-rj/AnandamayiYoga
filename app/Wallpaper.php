<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{InteractsWithCloud, Filterable};

class Wallpaper extends Model
{
	use InteractsWithCloud, Filterable;

    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(WallpaperCategory::class);
    }
}
