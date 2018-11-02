<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from($this->request->from)
                      ->subject($this->request->subject)
                      ->markdown('emails/admin');

        if ($this->request->attachment) {
            $email->attach($this->request->attachment->getRealPath(), array(
                'as' => $this->request->attachment->getClientOriginalName(),
                'mime' => $this->request->attachment->getMimeType()
            ));
        }

        return $email;
    }
}
