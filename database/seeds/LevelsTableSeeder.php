<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    public function run()
    {
        Level::create(['slug' => str_slug('Beginner'),'name' => 'Beginner', 'name_pt' => 'Iniciante']);

        Level::create(['slug' => str_slug('Intermediate'),'name' => 'Intermediate', 'name_pt' => 'Intermediário']);

        Level::create(['slug' => str_slug('Advanced'),'name' => 'Advanced', 'name_pt' => 'Avançado']);
    }
}