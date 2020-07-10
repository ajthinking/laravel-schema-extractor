<?php

namespace LaravelSchemaExtractor;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelSchemaExtractor\LaravelSchema;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LaravelSchema',
            function ($app) {
                return new LaravelSchema;
            }
        );
    }
}
