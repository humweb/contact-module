<?php

namespace Humweb\Contact;

use Humweb\Settings\SettingsSchema;

class ContactSettingsSchema extends SettingsSchema
{
    public function __construct($values = [], $decorator = null)
    {
        parent::__construct($values, $decorator);

        $this->settings = [
            'contact.email' => [
                'type' => 'text',
                'label' => 'From email',
                'description' => '',
            ],
            'contact.thank_you_mail' => [
                'type' => 'select',
                'options' => [
                    'email' => 'Send email',
                    'no_email' => 'No email',
                ],
                'label' => 'Thank you',
                'description' => 'Send thank you email.',
            ]
        ];
    }
}
