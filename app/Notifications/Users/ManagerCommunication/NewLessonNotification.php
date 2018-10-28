<?php

namespace App\Notifications\Users\ManagerCommunication;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewLessonNotification extends Notification
{
    // use Queueable;

    protected $user;
    protected $lesson;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $lesson)
    {
        $this->user = $user;
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
        $messages = [
            "Hey {$this->user->first_name}, we just published a new lesson! Check it out :)", 
            "There's a new lesson waiting for you, take a look!", 
            "Hi! We sent out a new lesson today, it's called {$this->lesson->name}, watch it now!"
        ];

        return [
            'type' => 'lesson',
            'message' => $messages[rand(0,2)],
            'url' => $this->lesson->path(),
            'image' => $this->lesson->image_path
        ];
    }
}
