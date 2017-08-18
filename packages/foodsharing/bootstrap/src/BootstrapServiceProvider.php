<?php

namespace Foodsharing\Bootstrap;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    protected $commands = [
        'Foodsharing\Bootstrap\Commands\Minify',
        'Foodsharing\Bootstrap\Commands\Installation',
        'Foodsharing\Bootstrap\Commands\Seed'
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * include routes
         */
        include __DIR__ . '/routes/old_version.php';
        include __DIR__ . '/routes/refactor.php';

        /*
         * Define Migrations
         */
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');


        $this->publishes([
            __DIR__ . '/config/foodsharing.php' => config_path('foodsharing.php'),
            __DIR__ . '/database/seeds' => database_path('seeds')
        ]);

        /*
         * Publish assets
         */
        $this->publishes([
           // __DIR__.'/homegrown/img' => public_path('/'),
            __DIR__.'/homegrown/js' => public_path('/js'),
            __DIR__.'/homegrown/css' => public_path('/css'),
            __DIR__.'/homegrown/fonts' => public_path('/fonts'),
            __DIR__.'/homegrown/robots.txt' => public_path('/robots.txt'),
            __DIR__.'/homegrown/favicon.ico' => public_path('/favicon.ico'),
            __DIR__.'/homegrown/cache' => public_path('/cache'),

        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
