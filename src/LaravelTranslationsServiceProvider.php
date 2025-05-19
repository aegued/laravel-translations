<?php

namespace Aegued\LaravelTranslations;

use Illuminate\Support\ServiceProvider;

class LaravelTranslationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../publishable/config/translations.php',
            'aegued'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../publishable/database/migrations');
        $this->publishes([__DIR__ . '/../publishable/config/translations.php' => config_path('translations.php')]);
    }
}
