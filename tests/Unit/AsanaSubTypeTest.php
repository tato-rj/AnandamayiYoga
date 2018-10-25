<?php

namespace Tests\Unit;

use Tests\AppTest;

class AsanaSubTypeTest extends AppTest
{
	protected $asana, $subtype;

	public function setUp()
	{
		parent::setUp();

		$this->asana = create('App\Asana');
		$this->subtype = create('App\AsanaSubType');
	}

	/** @test */
	public function it_has_many_lessons()
	{
		$this->asana->subtypes()->save($this->subtype);

		$this->assertInstanceOf('App\Asana', $this->subtype->fresh()->asanas->first());
	}

	/** @test */
	public function it_knows_how_many_asanas_it_has()
	{
		$this->asana->subtypes()->save($this->subtype);

		$this->assertEquals(1, $this->subtype->fresh()->asanas_count);		 
	}
}
