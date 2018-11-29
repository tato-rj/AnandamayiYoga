<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use App\Book;
use Tests\Traits\Administrator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BookTest extends AppTest
{
	use Administrator;

	/** @test */
	public function an_admin_can_add_a_new_book()
	{
		$this->adminSignIn();

		$book = $this->createNewBook();

		$this->assertDatabaseHas('books', ['title' => $book->title]);
	}
	
	/** @test */
	public function the_same_book_cannot_be_added_twice()
	{
		$this->adminSignIn();

		$book = $this->createNewBook();

		$this->expectException('Illuminate\Validation\ValidationException');

		$this->post(route('admin.reads.books.store'), $book->toArray());
	}

	/** @test */
	public function an_admin_can_edit_a_book()
	{
		$this->adminSignIn();

		$book = create('App\Book');

		$this->json('PATCH', route('admin.reads.books.update', $book->id), [
			'key' => 'title',
			'value' => 'new title'
		])->assertSuccessful();

		$this->assertDatabaseHas('books', ['title' => 'new title']);
	}

	/** @test */
	public function the_image_is_removed_when_a_new_one_is_uploaded()
	{
		$this->adminSignIn();

		$bookRequest = $this->createNewBook();

		$oldImage = $bookRequest->image;

		$createdBook = Book::where('title', $bookRequest->title)->first();

		$newImage = UploadedFile::fake()->image('newimage.jpg');

		Storage::disk('s3')->assertExists("local/books/images/{$oldImage->hashName()}");

		$this->json('PATCH', route('admin.reads.books.image.update', $createdBook->id), [
			'image' => $newImage
		]);

		Storage::disk('s3')->assertMissing("local/books/images/{$oldImage->hashName()}");
		Storage::disk('s3')->assertExists("local/books/images/{$newImage->hashName()}");
	}

	/** @test */
	public function an_admin_can_remove_a_book()
	{
		$this->adminSignIn();

		$book = create('App\Book');

		$this->delete(route('admin.reads.books.destroy', $book->id))
			 ->assertSessionHas('status');

		$this->assertDatabaseMissing('books', [
			'title' => $book->title
		]);
	}

	/** @test */
	public function the_books_image_is_removed_when_the_book_is_deleted()
	{
		$this->adminSignIn();

		$request = $this->createNewBook();

		$book = Book::where('title', $request->title)->first();

		$this->delete(route('admin.reads.books.destroy', $book->id))
			 ->assertSessionHas('status');

		Storage::disk('s3')->assertMissing($book->image_path);
	}
}
