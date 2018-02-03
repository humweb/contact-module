<?php

namespace Humweb\Contact;

use Humweb\Modules\ModuleBaseProvider;
use Illuminate\Routing\Router;

class ContactServiceProvider extends ModuleBaseProvider
{

    protected $moduleMeta = [
        'name'    => 'Contact',
        'slug'    => 'contact',
        'version' => '0.0.1',
        'author'  => 'Ryun Shofner',
        'email'   => 'ryun@humboldtweb.com',
        'website' => 'http://humboldtweb.com',
    ];


    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // Register module
        $this->app['modules']->put('contact', $this);

        // Setup resources
        $this->loadViews();
        $this->publishAssets();

        // Register providers
        $this->app->register(\Lanin\Laravel\EmailTemplatesOptimization\ServiceProvider::class);
        $this->app['settings.schema.manager']->register('contact', 'Humweb\Contact\ContactSettingsSchema');

        // Routes
        $this->app->router->group(['namespace' => 'Humweb\Contact\Http\Controllers', 'middleware' => 'web'],
            function (Router $router) {
                require __DIR__.'/Http/routes.php';
            });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register mailer
        $this->app->bind('contact.mailer', function ($app) {
            return new ContactMailer($app['settings']);
        });
    }


    public function getAdminMenu()
    {
        return [
            'Settings' => [
                [
                    'label' => 'Contact',
                    'url'   => '/admin/settings/contact',
                    'icon'  => '<i class="fa fa-fw fa-envelope"></i>',
                ],
            ],
        ];
    }


    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'contact.mailer',
        ];
    }
}
