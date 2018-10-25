<?php

namespace App\Notifications\Teachers;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LessonPublishedNotification extends Notification
{
    use Queueable;

    protected $lesson;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
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
                ->subject('Class published on AnandamayiYoga')
                ->markdown('emails.default', ['user' => $this->lesson->teacher])
                ->greeting("Your class has been published!")
                ->line("Hi {$this->lesson->teacher->name}, we are thrilled to let you know that your class \"{$this->lesson->name}\" was published today {$this->lesson->created_at->toFormattedDateString()}. We encourage you to share it with you colleagues, students and friends! Congrats:)")
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
