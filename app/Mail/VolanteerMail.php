<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolanteerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $mobile;
    public $job;
    public $comments;

    /**
     * Create a new message instance.
     *@param string $name
     *@param string $email
     *@param string $mobile
     *@param string $job
     *@param string $comments
     * @return void
     */
    public function __construct($name, $email, $mobile, $job, $comments)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->job = $job;
        $this->comments = $comments;
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
            ->view('emails.volanteer'); // This is the blade view for your email
            
    }
}
