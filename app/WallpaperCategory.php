<?php

namespace App;

class WallpaperCategory extends Anandamayi
{
    public function wallpapers()
    {
    	return $this->hasMany(Wallpaper::class, 'category_id');
    }
}
