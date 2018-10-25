<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeToNewsletter;
use App\Subscription;
use Tests\AppTest;

class SubscriptionTest extends AppTest
{
	/** @test */
	public function guests_can_subscribe_to_the_newsletter()
	{
		$this->assertFalse(Subscription::newsletter()->exists());

		$this->subscribe('newsletter')
			 ->assertSessionHas('status');

		$this->assertTrue(Subscription::newsletter()->exists());
	}

	/** @test */
	public function guests_receive_an_email_when_subscribing_to_the_newsletter()
	{
		Mail::fake();

		$this->subscribe('newsletter');
		
		Mail::assertSent(WelcomeToNewsletter::class);
	}

	/** @test */
	public function guests_cannot_subscribe_twice()
	{
		$this->subscribe('newsletter');

		$this->subscribe('newsletter')
			 ->assertSessionHas('error');
	}

	/** @test */
	public function users_are_not_automatically_subscribed_to_the_newsletter_upon_registration()
	{
		Mail::fake();

		$this->register();
		
		$this->assertFalse(Subscription::newsletter()->contains(auth()->user()->email));

		Mail::assertNotSent(WelcomeToNewsletter::class);
	}

	/** @test */
	public function users_are_automatically_subscribed_to_the_journey_list_upon_registration()
	{

		$this->register();
		
		$this->assertTrue(Subscription::journey()->contains(auth()->user()->email)); 
	}

	/** @test */
	public function users_are_automatically_subscribed_to_the_promo_list_upon_registration()
	{

		$this->register();

		$this->assertTrue(Subscription::promo()->contains(auth()->user()->email)); 
	}

	/** @test */
	public function users_may_selectively_unsusbscribe_from_newsletter()
	{
		$this->register();

		auth()->user()->subscribeTo(['newsletter']);

		$this->assertTrue(Subscription::newsletter()->contains(auth()->user()->email));

		$this->delete(route('subscriptions.destroy', 'newsletter'), ['subscription_email' => auth()->user()->email]);

		$this->assertFalse(Subscription::newsletter()->contains(auth()->user()->email));
	}

	/** @test */
	public function users_may_selectively_unsubscribe_from_the_journey_list()
	{
		$this->register();

		$this->assertTrue(Subscription::journey()->contains(auth()->user()->email));

		$this->delete(route('subscriptions.destroy', 'journey'), ['subscription_email' => auth()->user()->email]);

		$this->assertFalse(Subscription::journey()->contains(auth()->user()->email));
	}

	/** @test */
	public function users_may_selectively_unsubscribe_from_the_promo_list()
	{
		$this->register();

		$this->assertTrue(Subscription::promo()->contains(auth()->user()->email));

		$this->delete(route('subscriptions.destroy', 'promo'), ['subscription_email' => auth()->user()->email]);

		$this->assertFalse(Subscription::promo()->contains(auth()->user()->email));
	}

	/** @test */
	public function users_are_removed_from_all_subscriptions_when_deleting_their_account()
	{
		$this->register();

		$email = auth()->user()->email;

		$this->deleteUser();

		$this->assertFalse(Subscription::promo()->contains($email));
		$this->assertFalse(Subscription::newsletter()->contains($email));
		$this->assertFalse(Subscription::journey()->contains($email));
	}

	/** @test */
	public function a_user_knowsn_if_it_is_subscribed_to_a_specific_list()
	{
		$this->register();

		$this->assertTrue(auth()->user()->isSubscribedTo('journey'));
	}
}
