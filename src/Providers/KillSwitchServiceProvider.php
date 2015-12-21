<?php namespace KillSwitch\Providers;

use Illuminate\Support\ServiceProvider;

class KillSwitchServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        dd('caught in the boot');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
