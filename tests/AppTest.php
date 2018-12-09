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
            'schedule' => '"[{\"day\":\"2\",\"time\":\"afternoon\",\"duration\":\"10\"},{\"day\":\"4\",\"time\":\"evening\",\"duration\":\"35\"}]"',
            'questions' => 'a:4:{i:0;s:43:"Dapibus ultrices in iaculis nunc sed augue?";i:1;s:124:"A condimentum vitae sapien pellentesque habitant morbi. Aliquam vestibulum morbi blandit cursus risus at ultrices mi tempus?";i:2;s:252:"Morbi tristique senectus et netus et malesuada fames ac turpis. Leo vel orci porta non. Porttitor eget dolor morbi non arcu risus quis varius quam. Orci nulla pellentesque dignissim enim sit amet. Felis eget velit aliquet sagittis id consectetur purus?";i:3;s:58:"Sed ullamcorper morbi tincidunt ornare massa eget egestas?";}',
            'answers' => 'a:4:{i:0;s:7:"asdssss";i:1;s:4:"adas";i:2;s:6:"asdasd";i:3;s:5:"asdas";}'
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
