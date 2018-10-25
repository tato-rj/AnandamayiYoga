<?php

namespace App\Notifications\Purchases;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CoursePurchaseNotification extends Notification
{
    use Queueable;

    protected $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                ->subject("{$this->course->name} at AnandamayiYoga")
                ->markdown('emails.default')
                ->greeting('Thank you for your purchase')
                ->line("Congratulations! You have successfully purchased {$this->course->name}. To review your order you may go to the Invoices page, under your account settings.")
                ->line('We hope you enjoy the course!');
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
            'type' => 'course',
            'message' => "Your purchase of {$this->course->name} was successful! Click here to view the course.",
            'url' => route('courses.show', $this->course->slug),
            'image' => $this->course->image_path
        ];
    }
}
