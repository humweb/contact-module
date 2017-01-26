<?php

namespace Humweb\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThankYou extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    /**
     * Create a new message instance.
     *
     * @param       $emailAddress
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data         = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact::thanks', $this->data)
                    ->to($this->data['email'])
                    ->subject('Thank you - '.$this->data['first_name'].' '.$this->data['last_name']);
    }
}
