<?php

namespace D15r\Deployment;

use Illuminate\Support\ServiceProvider;

class DeploymentServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', '{{ vendor }}');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', '{{ vendor }}');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-deploy.php', 'laravel-deploy');

        // Register the service the package provides.
        // $this->app->singleton('laravel-deploy', function ($app) {
        //     return new Deployment;
        // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-deploy'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-deploy.php' => config_path('laravel-deploy.php'),
        ], 'laravel-deploy.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/{{ vendor }}'),
        ], 'laravel-deploy.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/{{ vendor }}'),
        ], 'laravel-deploy.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/{{ vendor }}'),
        ], 'laravel-deploy.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
