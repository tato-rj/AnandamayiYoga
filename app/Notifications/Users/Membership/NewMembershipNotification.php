<?php

namespace App\Notifications\Users\Membership;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMembershipNotification extends Notification
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
                ->subject('AnandamayiYoga Membership')
                ->markdown('emails.default', ['user' => $this->user])
                ->greeting('Thank you for joining our membership!')
                ->line("We are thrilled that you've joined us. Your membership starts today and you will be billed on every ".Carbon::now()->format('jS')." of each month. You can see all your invoices in your Invoices page under Account Settings.")
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
            'type' => 'membership',
            'message' => 'We are thrilled that you\'ve joined us. Check out our Yoga Routine service and create your own today!',
            'url' => route('user.routine.instructions'),
            'image' => 'app/brand/welcome.png'
        ];
    }
}
