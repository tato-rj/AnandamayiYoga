<?php

use Illuminate\Database\Seeder;
use App\ArticleTopic;

class ArticleTopicsTableSeeder extends Seeder
{
    public function run()
    {
        ArticleTopic::create(['slug' => str_slug('asana'), 'name' => 'asana', 'name_pt' => 'asana', 'order' => 0]);

        ArticleTopic::create(['slug' => str_slug('nature'), 'name' => 'nature', 'name_pt' => 'natureza', 'order' => 1]);
        
        ArticleTopic::create(['slug' => str_slug('health'), 'name' => 'health', 'name_pt' => 'saúde', 'order' => 2]);
        
        ArticleTopic::create(['slug' => str_slug('philosophy'), 'name' => 'philosophy', 'name_pt' => 'filosofia', 'order' => 3]);
        
        ArticleTopic::create(['slug' => str_slug('best practies'), 'name' => 'best practices', 'name_pt' => 'como praticar', 'order' => 3]);
    }
}
