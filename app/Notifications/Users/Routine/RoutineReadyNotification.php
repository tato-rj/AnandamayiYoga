<?php

namespace App\Notifications\Users\Routine;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RoutineReadyNotification extends Notification
{
    protected $routine;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($routine)
    {
        $this->routine = $routine;
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
                ->subject('AnandamayiYoga 4-week routine completed')
                ->markdown('emails.default', ['user' => $this->routine])
                ->greeting('Your routine is ready!')
                ->line("We just published your 4-week routine program, please visit dashboard daily to keep track of your schedule. Your first class will be on {$this->routine->startsAt->toFormattedDateString()}. We'll see you then :)");
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
            'type' => 'routine',
            'message' => 'Your routine is ready! Visit your dashboard daily to keep track of your schedule.',
            'url' => route('user.home'),
            'image' => 'app/brand/routine.png'
        ];
    }
}
