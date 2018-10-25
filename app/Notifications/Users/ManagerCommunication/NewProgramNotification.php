<?php

namespace App\Notifications\Users\ManagerCommunication;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewProgramNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $program;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $program)
    {
        $this->user = $user;
        $this->program = $program;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $messages = [
            "Hi {$this->user->first_name}, we created a new program! Enjoy :)", 
            "We have a new program for you! It's called {$this->program->name}, take a look!", 
            "Hello! We sent out a new program, watch it now!"
        ];

        return [
            'type' => 'program',
            'message' => $messages[rand(0,2)],
            'url' => $this->program->path(),
            'image' => $this->program->image_path
        ];
    }
}
