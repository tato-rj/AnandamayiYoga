<?php

namespace App\Notifications\Users\Routine;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RequestReceivedNotification extends Notification
{
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
                ->subject('AnandamayiYoga 4-week routine request recevied')
                ->markdown('emails.default', ['user' => $this->user])
                ->greeting('Routine request received!')
                ->line("Everything looks good, we will start working on it right away and will let you know as soon as your schedule is ready :)");
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
            'message' => 'Your request has been received! We\'ll let you know when the 4-week routine is ready.',
            'url' => route('user.home'),
            'image' => 'app/brand/routine.png'
        ];
    }
}
