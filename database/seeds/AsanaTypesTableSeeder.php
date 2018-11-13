<?php

use Illuminate\Database\Seeder;
use App\AsanaType;

class AsanaTypesTableSeeder extends Seeder
{
    public function run()
    {
        AsanaType::create([
        	'slug' => str_slug('Standing'), 
        	'name' => 'Standing', 
        	'name_pt' => 'De pé', 
        	'order' => 0]);

        AsanaType::create([
        	'slug' => str_slug('Seated'), 
        	'name' => 'Seated', 
        	'name_pt' => 'Sentadas', 
        	'order' => 1]);
        
        AsanaType::create([
        	'slug' => str_slug('Supine'), 
        	'name' => 'Supine', 
        	'name_pt' => 'Deitadas de costas', 
        	'order' => 2]);
        
        AsanaType::create([
        	'slug' => str_slug('Prone'), 
        	'name' => 'Prone', 
        	'name_pt' => 'Deitadas de bruços', 
        	'order' => 3]);
        
        AsanaType::create([
        	'slug' => str_slug('Quadruped'), 
        	'name' => 'Quadruped', 
        	'name_pt' => 'Apoio em quatro membros', 
        	'order' => 4]);
        
        AsanaType::create([
        	'slug' => str_slug('Arm Balance & Inversions'), 
        	'name' => 'Arm Balance & Inversions', 
        	'name_pt' => 'Equilíbrio sobre os braços & Invertidas', 
        	'order' => 5]);
    }
}