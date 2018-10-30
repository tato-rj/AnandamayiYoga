<?php

namespace Tests\Feature\Admin;

use App\Article;
use Tests\AppTest;
use Tests\Traits\Admin;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArticleTest extends AppTest
{
	use Admin;

	/** @test */
	public function a_manager_can_publish_an_article()
	{
		$this->managerSignIn();

		$this->createNewArticle($blog = false);

		$articles = Article::learning()->get();
		$blog = Article::blog()->get();

		$this->assertCount(1, $articles);
		$this->assertCount(0, $blog);
	}

	/** @test */
	public function a_manager_can_publish_a_blog_post()
	{
		Storage::fake('s3');

		$this->managerSignIn();

		$this->createNewBlogPost();

		$articles = Article::learning()->get();
		$blog = Article::blog()->get();

		$this->assertCount(0, $articles);
		$this->assertCount(1, $blog);
	}

	/** @test */
	public function the_same_article_cannot_be_added_twice()
	{
		$this->managerSignIn();

		$request = $this->createNewArticle();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.articles.store'), $request->toArray());
	}

	/** @test */
	public function if_the_name_of_a_lesson_exists_the_manager_is_notified_right_after_typing_it()
	{
		$this->managerSignIn();

		$request = $this->createNewArticle();

		$this->json('POST', route('admin.articles.lookup'), ['title' => $request->title])
			 ->assertJson(['passes' => false]);

		$this->json('POST', route('admin.articles.lookup'), ['title' => 'A new title'])
			 ->assertJson(['passes' => true]);
	}

	/** @test */
	public function a_manager_can_edit_an_article()
	{
		$this->managerSignIn();

		$article = create('App\Article');

		$this->json('PATCH', route('admin.articles.update', $article->id), [
			'key' => 'title',
			'value' => 'new title'
		])->assertSuccessful();

		$this->assertDatabaseHas('articles', [
			'slug' => str_slug('new title'),
			'title' => 'new title'
		]);
	}

	/** @test */
	public function a_manager_can_update_the_article_topics()
	{
		$this->managerSignIn();

		$request = $this->createNewArticle();

		$article = Article::where('title', $request->title)->first();

		$this->json('PATCH', route('admin.articles.update-topics', $article->id), [
			'key' => 'topic',
			'value' => create('App\ArticleTopic')
		])->assertSuccessful();

		$this->assertCount(1, $article->fresh()->topics);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->managerSignIn();

		$articleRequest = $this->createNewArticle();

		$oldImage = $articleRequest->image;

		$createdArticle = Article::first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/articles/images/{$oldImage->hashName()}");

		$this->patch(route('admin.articles.image.update', $createdArticle->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/articles/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/articles/images/{$newImage->hashName()}");
	}

	/** @test */
	public function a_manager_can_remove_an_article()
	{
		$this->managerSignIn();

		$article = create('App\Article');

		$this->delete(route('admin.articles.destroy', $article->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('articles', [
			'title' => $article->title
		]);
	}

	/** @test */
	public function the_topics_relationships_are_removed_when_an_article_is_deleted()
	{
		$this->managerSignIn();

		$article = create('App\Article');

		$topic = create('App\ArticleTopic');

		$article->topics()->save($topic);

		$this->delete(route('admin.articles.destroy', $article->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('article_article_topic', [
			'article_topic_id' => $topic->id
		]);		 
	}

	/** @test */
	public function the_article_image_is_removed_when_the_article_is_deleted()
	{
		$this->managerSignIn();

		$request = $this->createNewArticle();

		$article = Article::where('title', $request->title)->first();

		$this->delete(route('admin.articles.destroy', $article->slug))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($article->image_path);
	}
}
