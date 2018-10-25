<?php

namespace App\Notifications\Managers\Signups;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotification extends Notification
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
        return ['database'];
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
            'type' => 'user',
            'message' => "{$this->user->fullName} has just signed up!",
            'url' => "/office/users/{$this->user->id}",
            'image' => $this->user->avatar()
        ];
    }
}
