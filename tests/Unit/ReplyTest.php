<?php

namespace Tests\Unit;

use Tests\AppTest;

class ReplyTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_user()
	{
		$reply = create('App\Reply');

		$this->assertInstanceOf('App\User', $reply->creator);
	}

	/** @test */
	public function it_belongs_to_a_discussion()
	{
		$reply = create('App\Reply');

		$this->assertInstanceOf('App\Discussion', $reply->discussion);		 
	}
}
