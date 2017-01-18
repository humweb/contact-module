<?php

namespace Humweb\Contact\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ContactMailers
 */
class ContactMailer extends Facade
{
    /**
     * Register accessor key
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'contact.mailer';
    }
}