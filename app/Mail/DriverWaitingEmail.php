<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverWaitingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.driver-waiting')
            ->with($this->data)
            ->subject('Your Driver Has Arrived');
    }
}