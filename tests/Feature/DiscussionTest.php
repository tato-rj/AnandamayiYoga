<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;

class DiscussionTest extends AppTest
{
	use UsesFakeStripe;

	/** @test */
	public function a_user_can_start_a_new_discussion()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$this->post(route('user.course.discussion.store', $course->slug), [
			'subject' => 'New discussion',
			'body' => 'A question here'
		])->assertSessionHas('status');

		$this->assertDatabaseHas('discussions', [
			'subject' => 'New discussion'
		]);
	}

	/** @test */
	public function only_authorized_users_can_start_a_discussion()
	{
		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->register();

		$course = create('App\Course');
		
		$this->post(route('user.course.discussion.store', $course->slug), [
			'subject' => 'New discussion',
			'body' => 'A question here'
		]);
	}

	/** @test */
	public function an_authorized_user_can_see_all_discussions()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$this->post(route('user.course.discussion.store', $course->slug), [
			'subject' => 'New discussion',
			'body' => 'A question here'
		]);

	 	$this->get(route('user.course.discussion.index', $course->slug))
	 		 ->assertSee('New discussion');
	}

	/** @test */
	public function an_authorized_user_can_see_a_specific_discussion()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['course_id' => $course->id]);

	 	$this->get(route('user.course.discussion.show', [$course->slug, $discussion->id]))
	 		 ->assertSee($discussion->subject);
	}

	/** @test */
	public function a_user_can_reply_to_a_discussion()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['course_id' => $course->id]);

		$this->post(route('user.course.discussion.reply.store', [$course->slug, $discussion->id]), [
			'body' => 'A reply'
		]);

		$this->assertDatabaseHas('replies', ['body' => 'A reply']);
	}

	/** @test */
	public function only_authorized_users_can_reply_to_a_discussion()
	{
		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->register();

		$course = create('App\Course');
		$discussion = create('App\Discussion');
		
		$this->post(route('user.course.discussion.reply.store', [$course->slug, $discussion->id]), [
			'body' => 'A reply'
		]);
	}

	/** @test */
	public function a_user_can_see_all_replies_from_a_specific_discussion()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion');

		$reply = create('App\Reply', ['discussion_id' => $discussion->id]);

	 	$this->get(route('user.course.discussion.show', [$course->slug, $discussion->id]))
	 		 ->assertSee($reply->body);
	}

	/** @test */
	public function users_can_delete_their_own_discussions()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['user_id' => auth()->user()->id]);

		$this->delete(route('user.course.discussion.destroy', [$course->slug, $discussion->id]));

		$this->assertDatabaseMissing('discussions', ['body' => $discussion->body]);
	}

	/** @test */
	public function all_replies_are_removed_when_a_discussion_is_deleted()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['user_id' => auth()->user()->id]);

		$reply = create('App\Reply', ['discussion_id' => $discussion->id]);

		$this->delete(route('user.course.discussion.destroy', [$course->slug, $discussion->id]));

		$this->assertDatabaseMissing('replies', ['body' => $reply->body]);
	}

	/** @test */
	public function users_cannot_delete_discussions_other_than_their_own()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion', ['user_id' => 200]);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('user.course.discussion.destroy', [$course->slug, $discussion->id]));

		$this->assertDatabaseHas('discussions', ['body' => $discussion->body]); 
	}

	/** @test */
	public function users_can_delete_their_own_replies()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion');

		$reply = create('App\Reply', ['user_id' => auth()->user()->id]);

		$this->delete(route('user.course.discussion.reply.destroy', [$course->slug, $discussion->id, $reply->id]));

		$this->assertDatabaseMissing('replies', ['body' => $reply->body]);
	}

	/** @test */
	public function users_cannot_delete_replies_other_than_their_own()
	{
		$this->register();

		$course = create('App\Course');
		
		$this->makeFakePurchase($course);

		$discussion = create('App\Discussion');

		$reply = create('App\Reply', ['user_id' => 200]);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('user.course.discussion.reply.destroy', [$course->slug, $discussion->id, $reply->id]));

		$this->assertDatabaseHas('replies', ['body' => $reply->body]); 
	}
}
