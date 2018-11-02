<?php

namespace Tests\Feature\Admin;

use App\Course;
use App\Mail\AdminEmail;
use App\Notifications\Teachers\{LessonPublishedNotification, ProgramPublishedNotification, CoursePublishedNotification};
use Tests\Traits\{SendsMail, Administrator};
use Illuminate\Support\Facades\{Mail, Notification};
use Tests\AppTest;

class EmailTest extends AppTest
{
	use SendsMail, Administrator;

	/** @test */
	public function a_admin_can_send_an_email_from_the_admin_page()
	{
		Mail::fake();

		$this->adminSignIn();

		$email = [
			'from' => 'email@email.com',
			'subject' => 'Email subject',
			'recipients' => 'johndoe@email.com, maryjane@email.com, chrismatt@email.com',
			'message' => 'Hello there! This is a test email.',
			'attachment' => null
		];

		$this->post(route('admin.email.send', $email));

		Mail::assertSent(AdminEmail::class, function($mail) {
		    return $mail->hasTo('johndoe@email.com');
		});

		Mail::assertSent(AdminEmail::class, function($mail) {
		    return $mail->hasTo('maryjane@email.com');
		});

		Mail::assertSent(AdminEmail::class, function($mail) {
		    return $mail->hasTo('chrismatt@email.com');
		});
	}

	/** @test */
	public function a_teacher_receives_an_email_when_their_lesson_is_published()
	{
		Notification::fake();

		$this->adminSignIn();

		$lesson = $this->createNewLesson();

		$this->assertEmailSent($lesson->teacher, LessonPublishedNotification::class, 'Your class has been published!');  		 
	}

	/** @test */
	public function a_teacher_receives_an_email_when_their_program_is_published()
	{
		Notification::fake();

		$this->adminSignIn();

		$program = $this->createNewProgram();

		$this->assertEmailSent($program->teacher, ProgramPublishedNotification::class, 'Your program has been published!');  		 
	}

	/** @test */
	public function each_teacher_from_a_course_is_notified_when_their_course_is_published()
	{
		Notification::fake();

		$this->adminSignIn();

		$courseRequest = $this->createNewCourse();

		$course = Course::where('name', $courseRequest->name)->first();

		$teacher1 = create('App\Teacher');
		$teacher2 = create('App\Teacher');

		$course->teachers()->attach([$teacher1->id, $teacher2->id]);

		$course->publish();

		foreach ($course->teachers as $teacher) {
			$this->assertEmailSent($teacher, CoursePublishedNotification::class, 'Your course has been published!'); 	
		} 		 
	}
}
