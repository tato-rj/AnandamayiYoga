<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{Lesson, Teacher, Program, Course, Asana, Wallpaper, Article};

class PolicyTest extends AppTest
{
	public function setUp()
	{
		parent::setUp();

		$this->admin = create('App\Admin', ['role' => 'manager']);
		$this->adminTeacher = create('App\Admin', ['role' => 'teacher']);
		$this->teacher = create('App\Teacher');
		$this->adminTeacher->update(['teacher_id' => $this->teacher->id]);
		$this->teacher->update(['admin_id' => $this->adminTeacher->id]);
		$this->lesson = create('App\Lesson');
	}

	/** @test */
	public function teachers_cannot_create_or_delete_lessons()
	{
		$this->assertTrue($this->admin->can('create', new Lesson));		
		$this->assertFalse($this->adminTeacher->can('create', new Lesson));

		$lesson = create('App\Lesson', ['teacher_id' => $this->adminTeacher->id]);

		$this->assertFalse($this->adminTeacher->can('delete', new Lesson));
		$this->assertFalse($this->adminTeacher->can('delete', $lesson));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_lessons()
	{
		$lesson = create('App\Lesson', ['teacher_id' => $this->adminTeacher->id]);

		$this->assertFalse($this->adminTeacher->can('update', new Lesson));
		$this->assertTrue($this->adminTeacher->can('update', $lesson));
	}

	/** @test */
	public function teachers_cannot_create_or_delete_programs()
	{
		$this->assertTrue($this->admin->can('create', new Program));		
		$this->assertFalse($this->adminTeacher->can('create', new Program));

		$program = create('App\Program', ['teacher_id' => $this->adminTeacher->id]);

		$this->assertFalse($this->adminTeacher->can('delete', new Program));
		$this->assertFalse($this->adminTeacher->can('delete', $program));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_programs()
	{
		$program = create('App\Program', ['teacher_id' => $this->adminTeacher->id]);

		$this->assertFalse($this->adminTeacher->can('update', new Program));
		$this->assertTrue($this->adminTeacher->can('update', $program));
	}

	/** @test */
	public function teachers_cannot_create_edit_or_delete_any_asana()
	{
		$this->assertFalse($this->adminTeacher->can('create', new Asana));
		$this->assertFalse($this->adminTeacher->can('update', new Asana));
		$this->assertFalse($this->adminTeacher->can('delete', new Asana));
	}

	/** @test */
	public function teachers_cannot_create_edit_or_delete_any_wallpaper()
	{
		$this->assertFalse($this->adminTeacher->can('create', new Wallpaper));
		$this->assertFalse($this->adminTeacher->can('update', new Wallpaper));
		$this->assertFalse($this->adminTeacher->can('delete', new Wallpaper));
	}

	/** @test */
	public function teachers_cannot_create_edit_or_delete_any_article()
	{
		$this->assertFalse($this->adminTeacher->can('create', new Article));
		$this->assertFalse($this->adminTeacher->can('update', new Article));
		$this->assertFalse($this->adminTeacher->can('delete', new Article));
	}

	/** @test */
	public function teachers_cannot_create_or_delete_courses()
	{
		$this->assertTrue($this->admin->can('create', new Course));		
		$this->assertFalse($this->adminTeacher->can('create', new Course));

		$course = create('App\Course');
		$course->teachers()->save($this->adminTeacher);

		$this->assertFalse($this->adminTeacher->can('delete', new Course));
		$this->assertFalse($this->adminTeacher->can('delete', $course));
	}

	/** @test */
	public function teachers_can_edit_only_their_own_courses()
	{
		$course = create('App\Course');
		$course->teachers()->save($this->adminTeacher);

		$this->assertFalse($this->adminTeacher->can('update', new Course));
		$this->assertTrue($this->adminTeacher->can('update', $course));
	}

	/** @test */
	public function teachers_cannot_create_new_teachers()
	{
		$this->assertTrue($this->admin->can('create', new Teacher));		
		$this->assertFalse($this->adminTeacher->can('create', new Teacher));
	}

	/** @test */
	public function teachers_can_only_update_their_own_profile()
	{
		$otherTeacher = create('App\Teacher');

		$this->assertFalse($this->adminTeacher->can('update', $otherTeacher));
		$this->assertTrue($this->adminTeacher->can('update', $this->teacher));
	}

	/** @test */
	public function teachers_cannot_see_other_teachers_profiles()
	{
		$otherTeacher = create('App\Teacher');

		$this->assertFalse($this->adminTeacher->can('view', $otherTeacher));
		$this->assertTrue($this->adminTeacher->can('view', $this->teacher));
	}

	/** @test */
	public function teachers_cannot_delete_any_teachers_profiles()
	{
		$otherTeacher = create('App\Teacher');

		$this->assertFalse($this->adminTeacher->can('delete', $otherTeacher));
		$this->assertFalse($this->adminTeacher->can('delete', $this->teacher));
	}
}
