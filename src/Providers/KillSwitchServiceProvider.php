<?php namespace KillSwitch\Providers;

use Illuminate\Support\ServiceProvider;
use KillSwitch\KillSwitch;

class KillSwitchServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(
            'killswitch',
            new KillSwitch(config('killswitch.url'))
        );
    }

}
