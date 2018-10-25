<?php

namespace Tests\Traits;

use App\Payment;
use Stripe\{Token, Subscription, Customer};

trait InteractsWithStripe
{
    protected $liveTest = false;

	protected function getStripeToken()
	{
		return Token::create([
			'card' => [
				'number' => '4242424242424242',
				'exp_month' => 1,
				'exp_year' => 2025,
				'cvc' => 123
			]
		]);	
	}

	protected function assertStripeHasSubscription($subscription)
	{
		try {
			return Subscription::retrieve($subscription);
		} catch (\Exception $e) {
			$this->fail('Expected to have a Stripe subscription, but there was none.');
		}
	}

	protected function deleteStripeCustomer($customer)
	{
		$customer = Customer::retrieve($customer);
		return $customer->delete();
	}

	protected function createStripeCustomer($token, $coupon = null)
	{
        $this->post('/membership', [
            'stripeEmail' => auth()->user()->email,
            'stripeToken' => $token,
            'coupon' => $coupon
        ]);
	}

    public function makeSubscribedUser($coupon = null)
    {
        $this->register();

        $this->assertFalse(auth()->user()->hasMembership());

        $token = $this->getStripeToken();

        $this->createStripeCustomer($token, $coupon);
    }

    public function purchase($user, $product, $coupon = null)
    {
    	if (! $user) {
			return $this->post(route('register'), [
	            'first_name' => 'John',
	            'last_name' => 'Doe',
	            'email' => 'jdoe@email.com',
	            'gender' => 'male',
	            'timezone' => null,
	            'password' => 'secret',
	            'password_confirmation' => 'secret',
	            'agreement' => '1',
	            'level_id' => null,
	            'categories' => null,
	            'type' => get_class($product),
	            'typeId' => $product->id,
	            'stripeToken' => 'tok_visa',
	            'stripeEmail' => 'jdoe@email.com',
	            'coupon' => $coupon,
	            'productId' => 'course-slug'
	        ]);
		} else {
			return $this->post(route('user.purchase.course', $product), [
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'email' => $user->email,
				'type' => get_class($product),
				'typeId' => $product->id,
				'stripeToken' => 'tok_visa',
	            'coupon' => $coupon
			]);
		}
    }
}