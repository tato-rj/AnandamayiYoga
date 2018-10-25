<?php

namespace Tests\Traits;

use Illuminate\Support\Facades\{Mail, Notification};

trait SendsMail
{
	public function assertEmailSent($user, $notification, $greeting)
	{
		$recipient = $user;

		Notification::assertSentTo(
		    $recipient,
		    $notification,
		    function ($notification) use ($recipient, $greeting) {
		        $mailData = $notification->toMail($recipient)->toArray();
		        $this->assertContains($greeting, $mailData['greeting']);
		        return true;
		    }
		);	
	}
}
