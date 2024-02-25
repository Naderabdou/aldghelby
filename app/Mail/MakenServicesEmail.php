<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MakenServicesEmail extends Mailable
{
    use Queueable, SerializesModels;
      public $message;
    /**
     * Create a new message instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

        //


    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->markdown('mail.Maken-Services')
        ->with('message', $this->message);

    }
}
