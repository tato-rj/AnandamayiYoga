<?php

namespace Tests\Traits;

use App\{Admin, Chapter};
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Administrator
{
	public function createNewArticle()
	{
		Storage::fake('s3');
		
		$request = make('App\Article');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->post(route('admin.reads.articles.store'), $request->toArray())
			 ->assertSessionHas('status');

		return $request;		
	}

	public function createNewBook()
	{
		Storage::fake('s3');
		
		$request = make('App\Book');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->post(route('admin.reads.books.store'), $request->toArray())
			 ->assertSessionHas('status');

		return $request;
	}

	public function createNewLesson()
	{
		Storage::fake('s3');
		
		$request = make('App\Lesson');

		$request->image = UploadedFile::fake()->image('image.jpg');
		$request->video = UploadedFile::fake()->image('video.mp4');

		$request->category = create('App\Category', [], 4);
		$request->levels = create('App\Level');

		$this->post(route('admin.classes.store'), $request->toArray())
			 ->assertSessionHas('status');

		return $request;
	}

	public function createNewCourse()
	{
		Storage::fake('s3');
		
		$request = make('App\Course');

		$request->image = UploadedFile::fake()->image('image.jpg');
		$request->video = UploadedFile::fake()->image('video.mp4');

		$request->teachers = [create('App\Teacher')->slug];

		$this->post(route('admin.courses.store'), $request->toArray())
			 ->assertSessionHas('status');

		return $request;
	}

	public function createNewChapter($course)
	{
		$this->json('POST', route('admin.courses.chapters.store', ['course' => $course->slug]))
			 ->assertSessionHas('status');
	
		return Chapter::latest()->first();
	}

	public function createNewLecture($course, $chapter)
	{
		Storage::fake('s3');

		$request = make('App\Lecture', ['type' => 'lecture']);
		$request->content_type = 'App\\Lecture';
		$request->video = UploadedFile::fake()->image('lecture-video.mp4');

		$this->post(route('admin.courses.chapters.content.create', [$course->slug, $chapter->id]), $request->toArray())
			 ->assertSessionHas('status');

		return $request;	
	}

	public function createNewDemonstration($course, $chapter)
	{
		Storage::fake('s3');

		$request = make('App\Lecture', ['type' => 'demonstration']);
		$request->content_type = 'App\\Lecture';
		$request->video = UploadedFile::fake()->image('demonstration-video.mp4');

		$this->post(route('admin.courses.chapters.content.create', [$course->slug, $chapter->id]), $request->toArray())
			 ->assertSessionHas('status');

		return $request;	
	}

	public function createNewAssignment($course, $chapter)
	{
		$this->post(route('admin.courses.chapters.content.create', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'content_type' => 'App\\Assignment',
			'name' => 'An assignment',
			'question' => 'Does this work?',
			'order' => 1
		]))->assertSessionHas('status');

		return $chapter->assignments()->latest()->first();	
	}

	public function createNewQuiz($course, $chapter)
	{
		$fakeQuiz = 
			[
				[
					"question" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit?",
					"answers" => [
						"options" => [
							"Aliquip ex ea commodo consequat.",
							"Nostrud exercitation ullamco laboris.",
							"Quis nostrud exercitation.",
							"Exercitation ullamco laboris nisi ut aliquip."
						],
						"correct" => [
							"1" => "on"
						]
					]
				]
			];

		$this->post(route('admin.courses.chapters.content.create', [
			'course' => $course->slug,
			'chapter' => $chapter->id,
			'content_type' => 'App\\Quiz',
			'name' => 'A quiz',
			'content' => $fakeQuiz,
			'order' => 1
		]))->assertSessionHas('status');

		return $chapter->quizzes()->latest()->first();	
	}

	public function createNewTeacher()
	{
		Storage::fake('s3');

		$request = make('App\Teacher');

		$request->image = UploadedFile::fake()->image('image.jpg');

		$this->post(route('admin.teachers.store'), $request->toArray())
			 ->assertSessionHas('status');

		return $request;		
	}

	public function createNewAsana()
	{
		Storage::fake('s3');
		
		$request = make('App\Asana');

		$request->image = UploadedFile::fake()->image('image.jpg');
		$request->video = UploadedFile::fake()->image('video.mp4');

		$benefit = create('App\AsanaBenefit');
		$request->benefits['en'] = [$benefit->content];
		$request->benefits['pt'] = [$benefit->content_pt];

		$step = create('App\AsanaStep');
		$request->steps['en'] = [$step->content];
		$request->steps['pt'] = [$step->content_pt];

		$request->types = create('App\AsanaType', [], 4);
		$request->subtypes = create('App\AsanaSubType', [], 2);
		$request->levels = create('App\Level');

		$this->post('/admin/asanas', $request->toArray())
			 ->assertSessionHas('status');

		return $request;
	}

	public function createNewProgram()
	{
		Storage::fake('s3');
		
		$request = make('App\Program');

		$request->image = UploadedFile::fake()->image('image.jpg');
		$request->video = UploadedFile::fake()->image('video.mp4');

		$request->category = create('App\Category', [], 4)->pluck('id');
		$request->lessons = create('App\Lesson', [], 2)->pluck('id');

		$this->post('/admin/programs', $request->toArray())
			 ->assertSessionHas('status');

		return $request;		
	}

	public function prepareAdmin()
	{
		$this->adminSignIn();

		$this->logout();

		return Admin::first();	
	}
}
