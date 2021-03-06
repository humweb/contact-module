<?php

namespace Humweb\Tests\Contact;

use Humweb\Contact\ContactServiceProvider;
use Humweb\Modules\ModuleServiceProvider;
use Humweb\Settings\ServiceProvider as SettingServiceProvider;
use Humweb\ThemeManager\ServiceProvider as ThemeServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            ModuleServiceProvider::class,
            ThemeServiceProvider::class,
            SettingServiceProvider::class,
            ContactServiceProvider::class,
        ];
    }

}