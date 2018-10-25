<?php

namespace App\Notifications\Users\Membership;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CanceledMembershipNotification extends Notification
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
                ->subject('Canceled Membership')
                ->markdown('emails.default', ['user' => $this->user])
                ->greeting('We\'re sorry to see you go')
                ->line("You have successfully canceled your membership. Your account will remain active until {$this->user->membership()->first()->subscription_ends_at->toFormattedDateString()}. After that day you will no longer be able to access our member exclusive content.")
                ->line('If you change your mind, you can resume your membership at anytime until then! In any case, we would love to hear from you to know why you chose to leave us and what we can improve.')
                ->action('Take our survey', '/survey');
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
            'type' => 'membership',
            'message' => "Your membership has been canceled. You will remain active until the end of your current billing cycle.",
            'url' => route('user.settings.payment'),
            'image' => 'app/brand/membership.png'
        ];
    }
}
