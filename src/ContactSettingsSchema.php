<?php

namespace Humweb\Contact;

use Humweb\Settings\SettingsSchema;

class ContactSettingsSchema extends SettingsSchema
{
    public function __construct($values = [], $decorator = null)
    {
        parent::__construct($values, $decorator);

        $this->settings = [
            'contact.path' => [
                'type' => 'text',
                'label' => 'Path',
                'description' => '',
            ],
            'contact.email' => [
                'type' => 'text',
                'label' => 'Email',
                'description' => '',
            ],
            'contact.template' => [
                'type' => 'text',
                'label' => 'Template',
                'description' => '',
            ]
        ];
    }
}
