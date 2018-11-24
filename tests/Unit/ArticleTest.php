<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\Article;

class ArticleTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_topic()
	{
		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$article->topic()->associate($topic);

		$this->assertInstanceOf('App\ArticleTopic', $article->topic);
	}

	/** @test */
	public function it_belongs_to_a_teacher()
	{
		$article = create('App\Article', [
			'author_id' => create('App\Teacher')->id
		]);

		$this->assertInstanceOf('App\Teacher', $article->author);
	}

	/** @test */
	public function it_can_be_found_by_topic()
	{
		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$article->topic()->associate($topic)->save();

		$this->assertCount(1, Article::byTopic($topic->id)->get());		
	}

	/** @test */
	public function it_finds_other_articles_about_the_same_topic()
	{
		$topic = create('App\ArticleTopic');

		$article = create('App\Article', ['topic_id' => $topic->id]);
		$similar = create('App\Article', ['topic_id' => $topic->id]);

		$this->assertCount(1, $article->similar()->get());
	}
}
