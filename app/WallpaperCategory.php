<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallpaperCategory extends Model
{
    public function wallpapers()
    {
    	return $this->hasMany(Wallpaper::class, 'category_id');
    }
}
