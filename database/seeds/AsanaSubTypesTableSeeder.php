<?php

use Illuminate\Database\Seeder;
use App\AsanaSubType;

class AsanaSubTypesTableSeeder extends Seeder
{
    public function run()
    {
        AsanaSubType::create([
        	'slug' => str_slug('Forward Bends'), 
        	'name' => 'Forward Bends', 
        	'name_pt' => 'Dobrando para frente', 
        	'order' => 0]);

        AsanaSubType::create([
        	'slug' => str_slug('Lateral Bends'), 
        	'name' => 'Lateral Bends', 
        	'name_pt' => 'Dobrando para lateral', 
        	'order' => 1]);
        
        AsanaSubType::create([
        	'slug' => str_slug('Backbends'), 
        	'name' => 'Backbends', 
        	'name_pt' => 'Dobrando para trás', 
        	'order' => 2]);
        
        AsanaSubType::create([
        	'slug' => str_slug('Twisting'), 
        	'name' => 'Twisting', 
        	'name_pt' => 'Torções', 
        	'order' => 3]);
        
        AsanaSubType::create([
        	'slug' => str_slug('Balancing'), 
        	'name' => 'Balancing', 
        	'name_pt' => 'Equilíbrio', 
        	'order' => 4]);
        
        AsanaSubType::create([
        	'slug' => str_slug('Neutral'), 
        	'name' => 'Neutral', 
        	'name_pt' => 'Neutras', 
        	'order' => 5]);
    }
}