<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\UsesFakeStripe;

class FakeCoursePurchaseTest extends AppTest
{
	use UsesFakeStripe;

	protected $course, $chapter;

	public function setUp()
	{
		parent::setUp();

		$this->course = create('App\Course');

		$this->chapter = create('App\Chapter');

		$this->teacher = create('App\Teacher');

		$this->course->teachers()->save($this->teacher);
	}

	/** @test */
	public function a_course_content_is_only_accessible_to_those_who_purchased_it()
	{
		$this->register();
		
		$course = create('App\Course', ['published' => true]);
		
		$this->get(route('courses.show', $course->slug))
			 ->assertDontSee('Join the Discussion');

		$this->makeFakePurchase($course);

		$this->get(route('courses.show', $course->slug))
			 ->assertSee('Join the Discussion');
	}

	/** @test */
	public function a_guest_cannot_purchase_a_course_without_signing_up()
	{
		$this->course->published = 1;
		$this->course->save();

		$this->get(route('courses.purchase', $this->course->slug))
			 ->assertDontSee('Please confirm your payment method');

		$this->expectException('Illuminate\Auth\AuthenticationException');

		$this->post(route('user.purchase.course', $this->course->slug));
	}

	/** @test */
	public function users_can_view_their_purchase_history_on_their_invoices_list()
	{
		$this->register();
		
		$course = create('App\Course', ['name' => 'Purchase of Omnis vel hic fugit non et.']);

		$this->get(route('user.settings.invoices'))->assertDontSee($course->name);

		$this->makeFakePurchase($course);

		$this->createFakeProductSucceededCharge();

		$this->get(route('user.settings.invoices'))->assertSee($course->name);
	}
}
