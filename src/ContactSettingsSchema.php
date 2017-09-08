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
                'type'        => 'text',
                'label'       => 'To email',
                'description' => 'Email that will receive contact info.',
            ],

            'contact.thank_you_mail' => [
                'type'        => 'select',
                'options'     => [
                    'email'    => 'Send email',
                    'no_email' => 'No email',
                ],
                'label'       => 'Send thank you email',
            ],

            'contact.template_thank_you' => [
                'type'        => 'textarea',
                'label'       => 'Thank you template',
                'description' => 'Template to use for thank you email.',
            ]
        ];
    }
}
