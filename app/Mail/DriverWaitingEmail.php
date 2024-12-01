<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverWaitingEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    public $emailContent;

    public function __construct($data, $emailContent)
    {
        $this->data = $data;
        $this->emailContent = $emailContent;
    }

    public function build()
    {
        return $this->view('emails.driver_waiting_email')
            ->with($this->data, $this->emailContent)
            ->subject('Your Driver Has Arrived');
    }
}