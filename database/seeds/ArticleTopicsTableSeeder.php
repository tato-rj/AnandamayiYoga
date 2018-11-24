<?php

use Illuminate\Database\Seeder;
use App\ArticleTopic;

class ArticleTopicsTableSeeder extends Seeder
{
    public function run()
    {
        ArticleTopic::create(['slug' => str_slug('Asana'), 'name' => 'Asana', 'name_pt' => 'Asana', 'order' => 0]);

        ArticleTopic::create(['slug' => str_slug('Anatomy'), 'name' => 'Anatomy', 'name_pt' => 'Anatomia', 'order' => 1]);
        
        ArticleTopic::create(['slug' => str_slug('Pranayama'), 'name' => 'Pranayama', 'name_pt' => 'Pranayama', 'order' => 2]);
        
        ArticleTopic::create(['slug' => str_slug('Philosophy'), 'name' => 'Philosophy', 'name_pt' => 'Filosofia', 'order' => 3]);
        
        ArticleTopic::create(['slug' => str_slug('Meditation'), 'name' => 'Meditation', 'name_pt' => 'Meditação', 'order' => 4]);
    }
}
