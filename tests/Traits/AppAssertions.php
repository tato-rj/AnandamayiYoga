<?php

namespace Tests\Traits;

trait AppAssertions
{
	public function assertNotificationsHasType($type)
	{
		$this->assertTrue(auth()->user()->fresh()->notifications->pluck('data.type')->contains($type));
	}

	public function assertNotificationsContains($text)
	{
		$this->assertTrue(auth()->user()->fresh()->notifications->pluck('data.message')->contains($text));
	}

	public function assertNotificationsDontContain($text)
	{
		$this->assertFalse(auth()->user()->fresh()->notifications->pluck('data.message')->contains($text));
	}
}
