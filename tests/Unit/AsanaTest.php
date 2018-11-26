<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\Asana;

class AsanaTest extends AppTest
{
	protected $asana;

	public function setUp()
	{
		parent::setUp();

		$this->asana = create('App\Asana');
	}

	/** @test */
	public function it_has_many_levels()
	{
		$level1 = create('App\Level');
		$this->asana->levels()->save($level1);

		$level2 = create('App\Level');
		$this->asana->levels()->save($level2);

		$this->assertInstanceOf('App\Level', $this->asana->levels()->first());
		$this->assertEquals(2, count($this->asana->levels));	
	}

	/** @test */
	public function it_has_many_benefits()
	{
		$this->asana->benefits()->saveMany([
			new \App\AsanaBenefit(['content' => 'This asana is good for...']),
			new \App\AsanaBenefit(['content' => 'Another benefit is...'])
		]);

		$this->assertEquals(2, $this->asana->benefits()->count());
	}

	/** @test */
	public function it_has_many_steps()
	{
		$this->asana->steps()->saveMany([
			new \App\AsanaStep(['content' => 'The first step is...'])
		]);

		$this->assertEquals(1, $this->asana->steps()->count());
	}

	/** @test */
	public function it_knows_if_it_has_all_levels()
	{
		$level1 = create('App\Level');
		$level2 = create('App\Level');
		$level3 = create('App\Level');

		$this->asana->levels()->save($level1);
		$this->asana->levels()->save($level2);

		$this->assertFalse($this->asana->hasAllLevels());

		$this->asana->levels()->save($level3);

		$this->assertTrue($this->asana->hasAllLevels());
	}

	/** @test */
	public function it_has_many_categories()
	{
		$type1 = create('App\AsanaType');
		$this->asana->types()->save($type1);

		$type2 = create('App\AsanaType');
		$this->asana->types()->save($type2);

		$this->assertInstanceOf('App\AsanaType', $this->asana->types()->first());
		$this->assertEquals(2, count($this->asana->types));
	}

	/** @test */
	public function it_knows_if_it_has_been_favorited_by_the_user()
	{
		$this->register();

		$this->post(route('user.favorite.store', $this->asana->slug), [
			'favorited_id' => $this->asana->id,
			'favorited_type' => get_class($this->asana)
		]);

		$this->assertTrue($this->asana->fresh()->isFavorited());
	}

	/** @test */
	public function it_keeps_track_of_the_number_of_visits()
	{
		$this->signIn(create('App\User', ['confirmed' => true]));

		$asana = create('App\Asana');

		$this->assertEquals(0, $asana->views);

		$this->get($asana->path());

		$this->assertEquals(1, $asana->fresh()->views);
	}

	/** @test */
	public function the_app_knows_the_total_amount_of_asana_visits()
	{
		$this->signIn(create('App\User', ['confirmed' => true]));
		
		$asana1 = create('App\Asana');
		$asana2 = create('App\Asana');
		$asana3 = create('App\Asana');

		$this->get($asana1->path());
		$this->get($asana1->path());
		$this->get($asana2->path());
		$this->get($asana2->path());
		$this->get($asana3->path());

		$this->assertEquals(5, \App\Asana::all()->sum('views'));
	}

	/** @test */
	public function it_can_be_searched()
	{
		$asana1 = $this->asana;

		$asana2 = create('App\Asana', [
			'name' => 'cat',
			'also_known_as' => 'gato']);

		$asana3 = create('App\Asana', [
			'name' => 'dog',
			'also_known_as' => 'cachorro']);

		$asana4 = create('App\Asana', [
			'name' => 'bird',
			'also_known_as' => 'passaro']);

		$asana5 = create('App\Asana', [
			'name' => 'fish',
			'also_known_as' => 'peixe']);

		$this->get(route('discover.asanas.index', ['search' => 'bird']))
			 ->assertSee('bird')
			 ->assertDontSee('fish');

		$this->get(route('discover.asanas.index', ['search' => 'bird fish']))
			 ->assertSee('bird')
			 ->assertSee('fish');
	}

	/** @test */
	public function it_can_be_filtered_by_type()
	{
		$asana1 = $this->asana;

		$asana2 = create('App\Asana');

		$type = create('App\AsanaType', ['name' => 'awesome']);

		$asana2->types()->attach($type);

		$this->get(route('discover.asanas.index'))
			 ->assertSee($asana1->name)
			 ->assertSee($asana2->name);

		$this->get(route('discover.asanas.index', ['types' => [$type->slug]]))
			 ->assertSee($asana2->name)
			 ->assertDontSee($asana1->name);
	}

	/** @test */
	public function it_can_be_filtered_by_subtype()
	{
		$asana1 = $this->asana;

		$asana2 = create('App\Asana');

		$subtype = create('App\AsanaSubType', ['name' => 'awesome']);

		$asana2->subtypes()->attach($subtype);

		$this->get(route('discover.asanas.index'))
			 ->assertSee($asana1->name)
			 ->assertSee($asana2->name);

		$this->get(route('discover.asanas.index', ['subtypes' => [$subtype->slug]]))
			 ->assertSee($asana2->name)
			 ->assertDontSee($asana1->name);
	}

	/** @test */
	public function it_can_be_filtered_by_level()
	{
		$asana1 = $this->asana;

		$asana2 = create('App\Asana');

		$level = create('App\Level', ['name' => 'easy']);

		$asana2->levels()->attach($level);

		$this->get(route('discover.asanas.index'))
			 ->assertSee($asana1->name)
			 ->assertSee($asana2->name);

		$this->get(route('discover.asanas.index', ['levels' => [$level->name]]))
			 ->assertSee($asana2->name)
			 ->assertDontSee($asana1->name);
	}
}
