<?php

namespace Humweb\Contact\Facades;

/**
 * Class ContactMailers
 */
class ContactMailers extends \Illuminate\Support\Facades\Facade
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