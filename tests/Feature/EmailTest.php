<?php

namespace Tests\Feature;

use App\Mail\{EmailConfirmation, WelcomeEmail, AdminEmail, FeedbackEmail, ContactEmail};
use Tests\Traits\{SendsMail, UsesFakeStripe, HasRoutine};
use App\Notifications\Users\Membership\{NewMembershipNotification, CanceledMembershipNotification, ResumedMembershipNotification};
use App\Notifications\Users\Welcome\WelcomeNotification;
use App\Notifications\Users\RemovedAccountNotification;
use App\Notifications\Users\Routine\{RequestReceivedNotification, RoutineReadyNotification};
use App\Notifications\Purchases\CoursePurchaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\{Mail, Notification};
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\AppTest;

class EmailTest extends AppTest
{
	use SendsMail, UsesFakeStripe, HasRoutine;

	/** @test */
	public function a_confirmation_email_is_sent_upon_registration()
	{
		Mail::fake();

		$this->register();

		Mail::assertSent(EmailConfirmation::class);
	}

	/** @test */
	public function users_can_request_the_delivery_of_a_new_confirmation_email()
	{
		Mail::fake();

		$this->register();

		$this->post(route('register.confirm.request', ['email' => auth()->user()->email]))->assertSessionHas('status');

		Mail::assertSent(EmailConfirmation::class);
	}

	/** @test */
	public function users_receive_a_welcome_email_when_they_confirm_the_email()
	{
		Notification::fake();

		$this->register();

		$this->confirmEmail();

		$this->assertEmailSent(auth()->user(), WelcomeNotification::class, 'Enjoy your 15-day free trial!'); 
	}

	/** @test */
	public function users_receive_an_email_when_they_activate_their_membership()
	{
		Notification::fake();

		$this->register($confirmed = true);

		$this->createFakeMember();

		$this->assertEmailSent(auth()->user(), NewMembershipNotification::class, 'Thank you for joining our membership!'); 
	}

	/** @test */
	public function users_receive_an_email_when_they_cancel_their_membership()
	{
		Notification::fake();

		$this->register($confirmed = true);

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->assertEmailSent(auth()->user(), CanceledMembershipNotification::class, 'We\'re sorry to see you go'); 
	}

	/** @test */
	public function users_receive_an_email_when_they_resume_their_membership()
	{
		Notification::fake();

		$this->register($confirmed = true);

		$this->createFakeMember();

		$this->cancelFakeMembership();

		$this->createFakeMember();

		$this->assertEmailSent(auth()->user(), ResumedMembershipNotification::class, 'Welcome back!'); 
	}

	/** @test */
	public function users_receive_an_email_when_a_routine_request_has_been_received()
	{
		Notification::fake();

		$this->register();

		$this->submitRoutine();

		$this->assertEmailSent(auth()->user(), RequestReceivedNotification::class, 'Routine request received!'); 
	}

	/** @test */
	public function users_receive_an_email_when_a_routine_request_is_ready()
	{
		Notification::fake();

		$user = $this->register();

		$request = $this->requestRoutine();

		$this->adminSignIn();
		
		$routine = $this->createRoutine($request);

		$this->assertEmailSent($user, RoutineReadyNotification::class, 'Your routine is ready!'); 
	}

	/** @test */
	public function users_receive_an_email_when_they_make_a_purchase()
	{
		Notification::fake();

		$this->register();
		
		$course = create('App\Course', ['published' => true]);

		$this->makeFakePurchase($course);

		$this->assertEmailSent(auth()->user(), CoursePurchaseNotification::class, 'Thank you for your purchase'); 
	}

	/** @test */
	public function users_receive_one_final_email_to_confirm_a_deleted_account()
	{
		Notification::fake();

		$user = $this->register();

		$this->deleteUser();

		$this->assertEmailSent($user, RemovedAccountNotification::class, 'Your account has been deleted');  
	}

	/** @test */
	public function guests_can_send_an_email_through_the_contact_form()
	{
		Mail::fake();

		$this->post(route('support.contact.send', [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'jdoe@email.com',
			'subject' => 'Testing the email',
			'message' => 'This is just a test!'
		]))->assertSessionHas('status');

		Mail::assertSent(FeedbackEmail::class, function($mail) {
		    return $mail->hasTo('jdoe@email.com');
		});

		Mail::assertSent(ContactEmail::class, function($mail) {
		    return $mail->hasTo('contact@anandamayiyoga.com');
		});
	}
}
