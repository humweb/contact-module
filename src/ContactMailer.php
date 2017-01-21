<?php

namespace Humweb\Contact;

use Humweb\Contact\Mail\Contact;
use Humweb\Contact\Mail\ThankYou;
use Humweb\Settings\Setting;
use Illuminate\Contracts\Mail\MailQueue;

class ContactMailer
{

    /**
     * Data
     *
     * @var \Illuminate\Support\Collection|array
     */
    protected $data = [];

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
     * @param \Illuminate\Support\Collection|array $data
     *
     * @return void
     */
    public function send($data)
    {
        $this->setData($data)->sendMessage();

        if ($this->settings['contact.thank_you_mail'] !== 'no_email') {
            $this->sendThankYou();
        }
    }


    /**
     * Send contact message
     *
     * @return $this
     */
    protected function sendMessage()
    {
        $email = $this->settings->get('contact.email');
        $this->mail->send(new Contact($email, $this->data));

        return $this;
    }


    /**
     * Sent thank you message
     *
     * @return $this
     */
    protected function sendThankYou()
    {
        $from = $this->settings->get('contact.email');
        $this->mail->send(new ThankYou($from, $this->data));

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
