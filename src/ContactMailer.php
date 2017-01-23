<?php

namespace Humweb\Contact;

use Humweb\Contact\Mail\Contact;
use Humweb\Contact\Mail\ThankYou;
use Humweb\Core\Support\StringTemplate;
use Humweb\Settings\Setting;
use Illuminate\Support\Facades\Mail;

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
     * @param \Illuminate\Contracts\Mail\Mailer $mail
     * @param \Humweb\Settings\Setting          $settings
     */
    public function __construct(Setting $settings)
    {
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

        if ($this->settings->get('contact.thank_you_mail') !== 'no_email') {
            $this->sendThankYou();
        }
    }


    /**
     * Send contact message
     *
     * @return $this
     */
    public function sendMessage()
    {
        $email = $this->settings->get('contact.email');
        Mail::send(new Contact($email, $this->data));

        return $this;
    }


    /**
     * Sent thank you message
     *
     * @return $this
     */
    protected function sendThankYou()
    {
        $from               = $this->settings->get('contact.email');
        $template           = new StringTemplate($this->settings->get('contact.template_thank_you'), $this->data);
        $this->data['body'] = $template->compile();
        Mail::send(new ThankYou($from, $this->data));

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


    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
    }


    /**
     * @param mixed $settings
     *
     * @return ContactMailer
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

}
