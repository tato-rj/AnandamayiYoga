<?php

namespace App\Notifications\Users\Course;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyNotification extends Notification
{
    protected $reply;
    protected $discussion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
        $this->discussion = $this->reply->discussion;
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
            'type' => 'course',
            'message' => "Your discussion on {$this->discussion->course->name} got a new reply. Check it out!",
            'url' => route('user.course.discussion.show', [$this->discussion->course->slug, $this->discussion->id]),
            'image' => $this->discussion->course->image_path
        ];
    }
}
