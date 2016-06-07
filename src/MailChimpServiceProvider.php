<?php

namespace Jsd\MailChimp;

use Illuminate\Support\ServiceProvider;

class MailChimpServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Set up the publishing of configuration
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../views/mailchimp.blade.php' => base_path('resources/views/mailchimp.blade.php')
        ], 'view');
    }

    /**
     * Register the Mailchimp Instance to be set up with the API-key.
     * Then, the IoC-container can be used to get a Mailchimp instance ready for use.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Jsd\MailChimp\MailChimpController');
    }    
}
