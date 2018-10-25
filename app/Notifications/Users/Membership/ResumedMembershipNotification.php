<?php

namespace App\Notifications\Users\Membership;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResumedMembershipNotification extends Notification
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
                ->subject('Your membership is active again')
                ->markdown('emails.default', ['user' => $this->user])
                ->greeting('Welcome back!')
                ->line("You have successfully resumed your membership. Your billing cycle remains the same, and your next charge is scheduled for the next {$this->user->membership()->first()->created_at->addMonth()->toFormattedDateString()}.")
                ->line('To see you next invoice, just click on the button below.')
                ->action('See my invoices', '/settings/invoices');
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
            'message' => "Your membership is now active again!",
            'url' => route('home'),
            'image' => 'app/brand/membership.png'
        ];
    }
}
