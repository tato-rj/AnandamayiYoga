<?php

namespace App\Notifications\Users\Welcome;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\WelcomeToNewsletter;

class WelcomeNotification extends Notification
{
    use Queueable;

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
        return ['database', 'mail'];
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
                ->subject('Welcome to AnandamayiYoga')
                ->markdown('emails.default', ['user' => $this->user])
                ->greeting('Enjoy your 15-day free trial!')
                ->line("Dear {$this->user->first_name}, we're very excited that you have joined us! We invite you to take advantage of your 15-day free trial to see all that our platform has to offer. We hope you enjoy our classes and programs, and don\'t forget to check out the courses too.")
                ->action('Go to my dashboard', '/me')
                ->line('If you have any questions we\'re here to help, enjoy :)');
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
            'type' => 'free trial',
            'message' => 'Your free trial period starts today. Click here to discover our classes and courses!',
            'url' => route('discover.classes.index'),
            'image' => 'app/brand/trial.png'
        ];
    }
}
