<?php

namespace Tests\Unit;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;
use Tests\FakeStripe\{FakeStripe, FakeWebhooks};

class WebhooksTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function a_user_knows_when_it_has_been_charged_successfully()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->createFakeSucceededCharge();

		$this->assertCount(1, auth()->user()->fresh()->payments); 
	}

	/** @test */
	public function the_same_invoice_cannot_be_recorded_twice()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->createFakeSucceededCharge();

		$this->createFakeSucceededCharge();

		$this->assertCount(1, auth()->user()->fresh()->payments); 
	}

	/** @test */
	public function a_user_knows_when_a_charge_failed()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->createFakeFailedCharge();

		$this->assertTrue(auth()->user()->fresh()->lastChargeFailed()); 
	}

	/** @test */
	public function a_user_knows_when_a_charge_has_been_refunded()
	{
		$this->register();

		$this->createFakeMember();

		$this->assertTrue(auth()->user()->fresh()->isActive());

		$this->createFakeRefund();

		$this->assertTrue(auth()->user()->fresh()->payments()->first()->is_refund);
	}
}
