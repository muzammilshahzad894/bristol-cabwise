<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    public $emailContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $emailContent)
    {
        $this->data = $data;
        $this->emailContent = $emailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.refund')
            ->with($this->data, $this->emailContent)
            ->subject('Refund Confirmation');
    }
}
