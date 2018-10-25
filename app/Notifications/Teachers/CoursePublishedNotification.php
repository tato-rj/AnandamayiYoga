<?php

namespace App\Notifications\Teachers;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CoursePublishedNotification extends Notification
{
    use Queueable;

    protected $course;
    protected $teacher;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course, $teacher)
    {
        $this->course = $course;
        $this->teacher = $teacher;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Course published on AnandamayiYoga')
                ->markdown('emails.default', ['user' => $this->teacher])
                ->greeting("Your course has been published!")
                ->line("Hi {$this->teacher->name}, we are thrilled to let you know that your course \"{$this->course->name}\" was published today {$this->course->created_at->toFormattedDateString()}. We encourage you to share it with you colleagues, students and friends! Congrats:)")
                ->line('If you have any questions we\'re here to help.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
