<?php

namespace Tests\Unit;

use Tests\AppTest;

class ArticleTest extends AppTest
{
	/** @test */
	public function it_has_many_topics()
	{
		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$article->topics()->save($topic);

		$this->assertInstanceOf('App\ArticleTopic', $article->topics()->first());
	}
}
