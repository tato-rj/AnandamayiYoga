<?php

namespace Tests\Feature\Admin;

use App\Article;
use Tests\AppTest;
use Tests\Traits\Administrator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArticleTest extends AppTest
{
	use Administrator;

	/** @test */
	public function an_admin_can_publish_an_article()
	{
		Storage::fake('s3');

		$this->adminSignIn();

		$this->createNewArticle();

		$articles = Article::all();

		$this->assertCount(1, $articles);
	}

	/** @test */
	public function the_same_article_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$request = $this->createNewArticle();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.reads.articles.store'), $request->toArray());
	}

	/** @test */
	public function an_article_can_be_pinned_to_the_top()
	{
		$this->adminSignIn();

		$topic = create('App\ArticleTopic');

		$request = make('App\Article', ['topic_id' => $topic->id]);

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->post(route('admin.reads.articles.store'), $request->toArray());

		$pinnedArticle = make('App\Article', ['topic_id' => $topic->id, 'is_pinned' => true]);

		$pinnedArticle->image = UploadedFile::fake()->image('image.jpg');

		$this->post(route('admin.reads.articles.store'), $pinnedArticle->toArray());

		$this->assertEquals(Article::byTopic($topic->id)->pluck('is_pinned')->toArray(), [1,0]);
	}

	/** @test */
	public function if_the_name_of_a_lesson_exists_the_admin_is_notified_right_after_typing_it()
	{
		$this->adminSignIn();

		$request = $this->createNewArticle();

		$this->json('POST', route('admin.reads.articles.lookup'), ['title' => $request->title])
			 ->assertJson(['passes' => false]);

		$this->json('POST', route('admin.reads.articles.lookup'), ['title' => 'A new title'])
			 ->assertJson(['passes' => true]);
	}

	/** @test */
	public function a_admin_can_edit_an_article()
	{
		$this->adminSignIn();

		$article = create('App\Article');

		$this->json('PATCH', route('admin.reads.articles.update', $article->id), [
			'key' => 'title',
			'value' => 'new title'
		])->assertSuccessful();

		$this->assertDatabaseHas('articles', [
			'slug' => str_slug('new title'),
			'title' => 'new title'
		]);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$articleRequest = $this->createNewArticle();

		$oldImage = $articleRequest->image;

		$createdArticle = Article::first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/articles/images/{$oldImage->hashName()}");

		$this->patch(route('admin.reads.articles.image.update', $createdArticle->slug), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/articles/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/articles/images/{$newImage->hashName()}");
	}

	/** @test */
	public function a_admin_can_remove_an_article()
	{
		$this->adminSignIn();

		$article = create('App\Article');

		$this->delete(route('admin.reads.articles.destroy', $article->slug))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('articles', [
			'title' => $article->title
		]);
	}

	/** @test */
	public function the_article_image_is_removed_when_the_article_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewArticle();

		$article = Article::where('title', $request->title)->first();

		$this->delete(route('admin.reads.articles.destroy', $article->slug))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($article->image_path);
	}
}
