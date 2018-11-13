<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
        	'first_name' => 'Arthur', 
        	'last_name' => 'Villar',
        	'email' => 'arthurvillar@gmail.com',
        	'password' => bcrypt('maiden')
        ]);

        Admin::create([
        	'first_name' => 'Alice', 
        	'last_name' => 'Villar',
        	'email' => 'saldanhavillar@outlook.com',
        	'password' => bcrypt('aliceyoga')
        ]);
    }
}