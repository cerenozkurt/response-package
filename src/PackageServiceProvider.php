<?php

namespace CerenOzkurt\ResponseTrait;

use Illuminate\Support\ServiceProvider;

/**
 * Class PackageServiceProvider.
 */
class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('response_trait', ResponseBuilder::class);
        $this->mergeConfigFrom(__DIR__ . './../config/response-trait.php', 'response-trait');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePublishing();
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . './../config/response-trait.php' => config_path('response-trait.php')],
                'response-trait');
        }
    }
}