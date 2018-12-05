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
        	'password' => bcrypt('maiden'),
            'role' => 'manager'
        ]);

        Admin::create([
        	'first_name' => 'Alice', 
        	'last_name' => 'Villar',
        	'email' => 'saldanhavillar@outlook.com',
        	'password' => bcrypt('aliceyoga'),
            'role' => 'manager'
        ]);

        Admin::create([
            'first_name' => 'Renato', 
            'last_name' => 'Meireles',
            'email' => 'renato@email.com',
            'password' => bcrypt('renatom'),
            'teacher_id' => '2',
            'role' => 'teacher'
        ]);
    }
}