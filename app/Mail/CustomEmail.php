<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param  string  $subject
     * @param  string  $content
     * @param  string  $userName
     * @return void
     */
    public function __construct($subject, $content, $userName)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->userName = $userName;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('emails.custom_email'); // This is the blade view for your email
            
    }
}