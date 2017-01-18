<?php

namespace Humweb\Contact;

use Humweb\Settings\Setting;
use Illuminate\Contracts\Mail\MailQueue;

class ContactMailer
{

    /**
     * Data
     */
    protected $data;

    /**
     * The mail instance
     *
     * @var \Illuminate\Contracts\Mail\MailQueue
     */
    protected $mail;

    /**
     * Settings collection
     */
    protected $settings;


    /**
     * ContactMailer constructor.
     *
     * @param \Illuminate\Contracts\Mail\MailQueue $mail
     * @param \Humweb\Settings\Setting             $settings
     */
    public function __construct(MailQueue $mail, Setting $settings)
    {
        $this->mail     = $mail;
        $this->settings = $settings->getSection('contact');
    }


    /**
     * Send contact and thank you emails
     *
     * @param \Illuminate\Support\Collection $data
     *
     * @return void
     */
    public function send($data)
    {
        $this->setData($data)->sendMessage()->sendThanks();
    }


    /**
     * Send contact message
     *
     * @return $this
     */
    protected function sendMessage()
    {
        $this->mail->queue('contact::message', $this->data, function ($message) {
            $message->to($this->settings->get('contact.email'))
                    ->subject($this->data->first_name.' '.$this->data->last_name.' - Contact Message');
        });

        return $this;
    }


    /**
     * Sent thank you message
     *
     * @return $this
     */
    protected function sendThanks()
    {

        $this->mail->queue('contact::thanks', $this->data, function ($message) {
            $message->from($this->settings->get('contact.email'))
                    ->to($this->data->email)
                    ->subject('Thank you - '.$this->data->first_name.' '.$this->data->last_name);
        });

        return $this;
    }


    /**
     * Get contact data
     *
     * @return \Illuminate\Support\Collection
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Set contact data
     *
     * @param \Illuminate\Support\Collection $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }


    /**
     * Return the mail instance.
     *
     * @return \Illuminate\Contracts\Mail\MailQueue
     */
    public function getMail()
    {
        return $this->mail;
    }
}
