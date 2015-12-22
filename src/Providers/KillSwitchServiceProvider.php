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
        if ($this->app['ks']->status() === true) {
            \Artisan::call('down');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $ks = new KillSwitch(config('killswitch.url'));
        $this->app->instance('ks', $ks);
    }

}
