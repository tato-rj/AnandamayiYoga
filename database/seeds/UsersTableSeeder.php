<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	User::create([
    		'first_name' => 'John',
    		'last_name' => 'Doe',
    		'email' => 'doe@email.com',
    		'avatar_path' => 'https://anandamayiyoga.s3.amazonaws.com/app/avatars/default/male-1.png',
    		'level_id' => NULL,
    		'gender' => 'male',
    		'lang' => 'pt',
    		'timezone' => 'America/New_York',
    		'currency' => 'brl',
    		'password' => '$2y$10$Q6KU8YObACU5E.2gIQpDueteBZRaUDR26MoSzOk8OHvFDVurqOGPK',
    		'confirmation_token' => '23PSBL5mNVySp6owI1G0nDies',
    		'last_login_at' => now(),
    		'trial_ends_at' => now()->copy()->addDays(15),
    		'confirmed' => '1',
    		'remember_token' => 'UfDAtS4Tcf78modTd23AoLVJrOwRqFUIock0Vwjv86meEnu8hDhMEpRtlGNg'
    	]);
    }
}
