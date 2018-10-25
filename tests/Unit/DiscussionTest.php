<?php

namespace Tests\Unit;

use Tests\AppTest;

class DiscussionTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_user()
	{
		$discussion = create('App\Discussion');

		$this->assertInstanceOf('App\User', $discussion->creator);
	}

	/** @test */
	public function it_belongs_to_a_course()
	{
		$discussion = create('App\Discussion');

		$this->assertInstanceOf('App\Course', $discussion->course);		 
	}

	/** @test */
	public function it_may_belong_to_a_chapter()
	{
		$discussion = create('App\Discussion');

		$this->assertInstanceOf('App\Chapter', $discussion->chapter);		 
	}

	/** @test */
	public function it_has_many_replies()
	{
		$discussion = create('App\Discussion');
		$reply = create('App\Reply', ['discussion_id' => $discussion->id]);

		$this->assertInstanceOf('App\Reply', $discussion->replies->first());		 
	}
}
