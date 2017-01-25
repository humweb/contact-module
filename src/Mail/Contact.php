<?php

namespace Humweb\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $emailAddress;
    public $data;


    /**
     * Create a new message instance.
     *
     * @param       $emailAddress
     * @param array $data
     */
    public function __construct($emailAddress, $data = [])
    {
        $this->data         = $data;
        $this->emailAddress = $emailAddress;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact::message', $this->data)
                    ->from($this->emailAddress)
                    ->to($this->emailAddress)
                    ->subject('Contact message from: '.$this->data['first_name'].' '.$this->data['last_name']);
    }
}
