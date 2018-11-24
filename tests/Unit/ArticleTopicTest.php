<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\ArticleTopic;

class ArticleTopicTest extends AppTest
{
	/** @test */
	public function it_has_many_articles()
	{
		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$topic->articles()->save($article);
		
		$this->assertInstanceOf('App\Article', $topic->articles()->first());
	}
}
