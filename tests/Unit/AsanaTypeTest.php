<?php

namespace Tests\Unit;

use Tests\AppTest;

class AsanaTypeTest extends AppTest
{
	protected $asana, $type;

	public function setUp()
	{
		parent::setUp();

		$this->asana = create('App\Asana');
		$this->type = create('App\AsanaType');
	}

	/** @test */
	public function it_has_many_lessons()
	{
		$this->asana->types()->save($this->type);

		$this->assertInstanceOf('App\Asana', $this->type->fresh()->asanas->first());
	}

	/** @test */
	public function it_knows_how_many_asanas_it_has()
	{
		$this->asana->types()->save($this->type);

		$this->assertEquals(1, $this->type->fresh()->asanas_count);		 
	}
}
