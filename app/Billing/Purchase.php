<?php

namespace App\Billing;

use App\Billing\Coupon;
use App\Billing\StripeModel;
use Stripe\{Stripe, Charge, Customer, Subscription, Balance};

class Purchase extends StripeModel
{
    protected $guarded = [];
    protected $customer, $product, $request, $discount, $coupon;

    public function item()
    {
        return $this->belongsTo($this->product_type, 'product_id');
    }

    public function withCoupon($coupon = null)
    {
        if (! $coupon) {
            $this->discount = 100;

            return $this;
        }

        $this->coupon = Coupon::where('code', $coupon)->first();

        if (! $this->coupon || ! $this->coupon->redeem())
            throw new \Exception('The code you entered could not be redeemed at this time.');

        $this->discount = $this->coupon->discount;

        return $this;
    }

    public function createCustomer($data)
    {
    	$this->request = $data;

    	$model = ucfirst($this->request['type']);
    	$this->product = $model::find($this->request['typeId']);

        $this->customer = Customer::create([
            'description' => "{$this->request['first_name']} {$this->request['last_name']}",
            'email' => $this->request['email'],
            'source' => $this->request['stripeToken']
        ]);

        return $this;
    }

    public function charge($user)
    {
	   $charge = Charge::create([
	            'description' => "Purchase of {$this->product->name}",
	        	'customer' => $this->customer->id,
	        	'amount' => $this->product->cost*($this->discount/100),
	        	'currency' => getCurrency(),
                'receipt_email' => $user->email
	        ]);

        $code = ($this->coupon) ? $this->coupon->code : null;

        $user->purchase($this->product, $this->customer, $charge, $code);
    }
}
