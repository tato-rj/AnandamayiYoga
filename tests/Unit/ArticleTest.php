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

		$topic = create('App\ArticleTopic');

		$article->topics()->save($topic);

		$this->assertInstanceOf('App\ArticleTopic', $article->topics()->first());
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
	public function it_fetches_articles_by_types()
	{
		create('App\Article');
		create('App\Article');
		create('App\Article', ['subject'=> 'subject']);

		$this->assertCount(2, Article::blog()->get());
		$this->assertCount(1, Article::learning()->get());
	}

	/** @test */
	public function non_blog_articles_can_be_selected_by_subject()
	{
		create('App\Article', ['subject' => 'yoga-basics']);
		create('App\Article', ['subject' => 'yoga-philosophy']);
		create('App\Article', ['subject' => 'yoga-philosophy']);

		$this->assertCount(1, Article::learning()->subject('yoga-basics')->get());
		$this->assertCount(2, Article::learning()->subject('yoga-philosophy')->get());
	}
}
