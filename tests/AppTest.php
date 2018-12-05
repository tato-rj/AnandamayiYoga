<?php

namespace Tests;

use Tests\Utilities\ExceptionHandling;
use Tests\Traits\AppAssertions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;

abstract class AppTest extends TestCase
{
	use DatabaseMigrations, ExceptionHandling, AppAssertions;

    public function setUp()
    {
        parent::setUp();

        $this->disableExceptionHandling();

        $this->withSession(['gate' => 'authorized']);

        create('App\Book', [], 4);
        create('App\Teacher', ['name' => 'Anandamayi']);
    }
    
    protected function register($confirmed = true, $email = 'jdoe@email.com')
    {
        $result = $this->post(route('register'), [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $email,
            'gender' => 'male',
            'timezone' => null,
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'agreement' => '1',
            'level_id' => null,
            'categories' => null
        ]);

        if ($confirmed)
            $this->confirmEmail();

        return auth()->user();
    }

    protected function adminSignIn($admin = null)
    {
        $admin = ($admin) ?: create('App\Admin');
        return $this->actingAs($admin, 'admin');
    }
    
    protected function signIn($user = null)
    {
    	$user = ($user) ?: create('App\User');

    	return $this->actingAs($user);
    }

    protected function logout()
    {
        Auth::logout();
    }

    protected function deleteUser()
    {
        return $this->post(route('user.delete'), [
            'reason' => 'foo'
        ]);
    }

    protected function uploadAvatar($image)
    {
        return $this->json('POST', route('user.avatar.store', ['user' => auth()->user()->slug]), ['avatar' => $image]);
    }

    protected function confirmEmail()
    {
        return $this->get("/register/confirm?token=".auth()->user()->confirmation_token);
    }

    protected function submitRoutine($teacher = null)
    {
        $teacher = $teacher ?? create('App\Teacher');
        
        return $this->post(route('user.routine.store', [
            'teacher_id' => $teacher->id,
            'schedule' => '[{"day":"Monday", "time": "morning"}]',
            'duration' => '5 to 10 min',
            'age' => '29 to 39',
            'lifestyle' => 'Active. I exercise three or more times per week.',
            'reason' => null,
            'level' => 'Beginner',
            'categories' => ["Yoga"],
            'practice' => ["Run", "Gym"],
            'physical' => ["Increase flexibility and balance"],
            'mental' => ["Relieve anxiety and stress", "Overcome depression"],
            'spiritual' => ["Understand the Philosophy behind Yoga", "Experience inner peace"]
        ]));
    }

    public function subscribe($type, $email = 'guest@email.com')
    {
        return $this->post(route('subscriptions.store', $type), ['subscription_email' => $email]);
    }

    public function stripeActivate($user)
    {
        $user->membership()->update(['active' => true]);
        return $this;
    }


    public function stripeDeactivate($user)
    {
        $user->membership()->update(['active' => false]);
        return $this;
    }
}
