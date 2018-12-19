<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\Article;

class ArticleTest extends AppTest
{
	/** @test */
	public function it_has_many_topics()
	{
		$article = create('App\Article');

		$topic1 = create('App\ArticleTopic');
		$topic2 = create('App\ArticleTopic');

		$article->topics()->save($topic1);
		$article->topics()->save($topic2);

		$this->assertInstanceOf('App\ArticleTopic', $article->topics->first());
		$this->assertCount(2, $article->topics);
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

		$article->topics()->save($topic);

		$this->assertCount(1, Article::byTopic($topic->slug)->get());		
	}

	/** @test */
	public function it_finds_other_articles_about_the_same_topic()
	{
		$topic = create('App\ArticleTopic');
		$anotherTopic = create('App\ArticleTopic');

		$article = create('App\Article');
		$nonSimilar = create('App\Article');
		$similar = create('App\Article');

		$article->topics()->save($topic);
		$nonSimilar->topics()->save($anotherTopic);
		$similar->topics()->save($topic);

		$this->assertCount(1, $article->similar()->get());
	}
}
