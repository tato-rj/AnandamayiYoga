<?php

namespace Tests\Unit;

use Tests\AppTest;
use Carbon\Carbon;

class CouponTest extends AppTest
{
	/** @test */
	public function it_may_have_max_usage_limit()
	{
		$coupon = create('App\Billing\Coupon', ['limit' => 1]);

		$this->assertInstanceOf('App\Billing\Coupon', $coupon->redeem());

		$this->assertNull($coupon->redeem()); 
	}

	/** @test */
	public function it_may_have_an_expiration_date()
	{
		$coupon = create('App\Billing\Coupon', ['expires_at' => Carbon::now()->addDay()]);

		$this->assertInstanceOf('App\Billing\Coupon', $coupon->redeem());

		$coupon->update(['expires_at' => Carbon::now()->subWeek()]);

		$this->assertNull($coupon->redeem());	 
	}
}
