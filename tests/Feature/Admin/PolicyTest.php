<?php

namespace Tests\Feature\Admin;

use Tests\AppTest;
use Tests\Traits\{Administrator, HasRoutine};
use App\{Lesson, Teacher, Asana, Wallpaper, Article};

class PolicyTest extends AppTest
{
	use Administrator, HasRoutine;
	
	public function setUp()
	{
		parent::setUp();

		$this->admin = create('App\Admin', ['role' => 'manager']);
		$this->adminTeacher = create('App\Admin', ['role' => 'teacher']);
		$this->teacher = create('App\Teacher');
		$this->adminTeacher->update(['teacher_id' => $this->teacher->id]);
		$this->teacher->update(['admin_id' => $this->adminTeacher->id]);
	}

	/** @test */
	public function teachers_cannot_create_lessons()
	{		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createNewLesson();
	}

	/** @test */
	public function teachers_cannot_delete_lessons()
	{
		$lesson = create('App\Lesson');
		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('admin.classes.destroy', $lesson->slug));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_lessons()
	{
		$this->adminSignIn($this->adminTeacher);
		
		$lesson = create('App\Lesson', ['teacher_id' => $this->teacher->id]);
		$otherLesson = create('App\Lesson');

		$this->patch(route('admin.classes.update', $lesson->id), ['key' => 'description', 'value' => 'new description']);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->patch(route('admin.classes.update', $otherLesson->id), ['key' => 'description', 'value' => 'new description']);
	}

	/** @test */
	public function teachers_cannot_create_programs()
	{		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createNewProgram();
	}

	/** @test */
	public function teachers_cannot_delete_programs()
	{
		$program = create('App\Program');
		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('admin.programs.destroy', $program->slug));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_programs()
	{
		$this->adminSignIn($this->adminTeacher);
		
		$program = create('App\Program', ['teacher_id' => $this->teacher->id]);
		$otherProgram = create('App\Program');

		$this->patch(route('admin.programs.update', $program->id), ['key' => 'description', 'value' => 'new description']);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->patch(route('admin.programs.update', $otherProgram->id), ['key' => 'description', 'value' => 'new description']);
	}

	/** @test */
	public function teachers_cannot_create_courses()
	{		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createNewCourse();
	}

	/** @test */
	public function teachers_cannot_delete_courses()
	{
		$course = create('App\Course');
		
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('admin.courses.destroy', $course->slug));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_courses()
	{
		$this->adminSignIn($this->adminTeacher);
		
		$course = create('App\Course');
		$course->teachers()->save($this->teacher);
		$otherCourse = create('App\Course');

		$this->patch(route('admin.courses.update', $course->id), ['key' => 'description', 'value' => 'new description']);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->patch(route('admin.courses.update', $otherCourse->id), ['key' => 'description', 'value' => 'new description']);
	}

	/** @test */
	public function teachers_cannot_create_an_asana()
	{
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createNewAsana();
	}

	/** @test */
	public function teachers_cannot_edit_an_asana()
	{
		$asana = create('App\Asana');

		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->json('PATCH', route('admin.asanas.update', $asana->id), [
			'key' => 'name',
			'value' => 'new name'
		]);
	}

	/** @test */
	public function teachers_cannot_delete_an_asana()
	{
		$asana = create('App\Asana');

		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('admin.asanas.destroy', $asana->slug));
	}

	/** @test */
	public function teachers_cannot_create_an_article()
	{
		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createNewArticle();
	}

	/** @test */
	public function teachers_cannot_edit_an_article()
	{
		$article = create('App\Article');

		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->json('PATCH', route('admin.reads.articles.update', $article->id), [
			'key' => 'name',
			'value' => 'new name'
		]);
	}

	/** @test */
	public function teachers_cannot_delete_an_article()
	{
		$article = create('App\Article');

		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->delete(route('admin.reads.articles.destroy', $article->slug));
	}

	/** @test */
	public function teachers_cannot_create_routines_requested_for_other_teachers()
	{
		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn($this->adminTeacher);

		$this->expectException('Illuminate\Auth\Access\AuthorizationException');

		$this->createRoutine($request);
	}

	/** @test */
	public function teachers_can_create_routines_requested_for_themselves()
	{
		$user = $this->register();

		$request = $this->requestRoutine($this->adminTeacher);

		$this->adminSignIn($this->adminTeacher);

		$this->createRoutine($request);

		$this->assertDatabaseHas('routines', ['teacher_id' => $this->adminTeacher->teacher_id]);
	}
}
