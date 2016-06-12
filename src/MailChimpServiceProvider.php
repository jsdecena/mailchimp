<?php

namespace Jsdecena\MailChimp;

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
    	$this->loadViewsFrom(__DIR__.'/views', 'mailchimp');
    	
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/mailchimp')
        ]);
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
    }    
}
