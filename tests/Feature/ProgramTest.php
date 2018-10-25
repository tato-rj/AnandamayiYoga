<?php

namespace Tests\Feature;

use Tests\AppTest;

class ProgramTest extends AppTest
{
	/** @test */
	public function a_guest_can_browse_through_all_programs_on_the_discover_page()
	{
		$program = create('App\Program', ['name' => 'Great program']);
		$lesson = create('App\Lesson');

		$program->lessons()->save($lesson);

		$this->get(route('discover.programs.index'))->assertSee('Great program'); 
	}

	/** @test */
	public function a_guest_can_see_the_program_page()
	{
		$program = create('App\Program');
		$lesson = create('App\Lesson');

		$program->lessons()->save($lesson);

		$this->get(route('discover.programs.show', $program->slug))->assertSee($program->name);
	}
}
