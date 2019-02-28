<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Array of data being sent to view
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'iamwebwiz@gmail.com';
        $subject = 'Report for '. now()->toDateString();
        $name = 'Ezekiel Oladejo';

        return $this->view('mail')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with($this->data);
    }
}
