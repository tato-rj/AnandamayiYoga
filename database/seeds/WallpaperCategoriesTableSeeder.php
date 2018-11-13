<?php

use Illuminate\Database\Seeder;
use App\WallpaperCategory;

class WallpaperCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        WallpaperCategory::create(['name' => 'Asana', 'name_pt' => 'Asana', 'order' => 0]);

        WallpaperCategory::create(['name' => 'Nature', 'name_pt' => 'Natureza', 'order' => 1]);
        
        WallpaperCategory::create(['name' => 'Inspiration', 'name_pt' => 'Inspiração', 'order' => 2]);
        
        WallpaperCategory::create(['name' => 'Philosophy', 'name_pt' => 'Filosofia', 'order' => 3]);
    }
}