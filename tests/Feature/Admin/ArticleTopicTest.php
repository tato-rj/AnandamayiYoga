<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class ArticleTopicTest extends AppTest
{

	/** @test */
	public function an_admin_can_create_an_article_topic()
	{
		$this->adminSignIn();

		$topic = make('App\ArticleTopic');

		$this->post(route('admin.reads.topics.store'), [
			'name' => $topic->name
		]);

		$this->assertDatabaseHas('article_topics', [
			'name' => $topic->name
		]);		
	}

	/** @test */
	public function an_admin_can_edit_an_article_topic()
	{
		$this->adminSignIn();

		$topic = create('App\ArticleTopic');

		$this->json('PATCH', route('admin.reads.topics.update', $topic->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();
	}

	/** @test */
	public function an_admin_can_remove_a_topic()
	{
		$this->adminSignIn();

		$topic = create('App\ArticleTopic');

		$this->delete(route('admin.reads.topics.destroy', $topic->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('article_topics', [
			'name' => $topic->title
		]);
	}
}
