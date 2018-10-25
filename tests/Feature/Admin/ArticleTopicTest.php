<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;

class ArticleTopicTest extends AppTest
{

	/** @test */
	public function a_manager_can_create_an_article_topic()
	{
		$this->managerSignIn();

		$topic = make('App\ArticleTopic');

		$this->post(route('admin.articles.topics.store'), [
			'name' => $topic->name
		]);

		$this->assertDatabaseHas('article_topics', [
			'name' => $topic->name
		]);		
	}

	/** @test */
	public function a_manager_can_edit_an_article_topic()
	{
		$this->managerSignIn();

		$topic = create('App\ArticleTopic');

		$this->json('PATCH', route('admin.articles.topics.update', $topic->id), [
			'key' => 'name',
			'value' => 'new name'
		])->assertSuccessful();
	}

	/** @test */
	public function a_manager_can_remove_a_topic()
	{
		$this->managerSignIn();

		$topic = create('App\ArticleTopic');

		$this->delete(route('admin.articles.topics.destroy', $topic->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('article_topics', [
			'name' => $topic->title
		]);
	}

	/** @test */
	public function the_topics_relationships_are_removed_when_an_article_is_deleted()
	{
		$this->managerSignIn();

		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$article->topics()->save($topic);

		$this->delete(route('admin.articles.topics.destroy', $topic->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('article_article_topic', [
			'article_topic_id' => $topic->id
		]);		 
	}
}
