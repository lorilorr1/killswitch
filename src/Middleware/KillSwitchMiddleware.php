<?php

namespace KillSwitch\Middleware;

use Closure;
use Artisan;

class KillSwitchMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->app['killswitch']->status() === true) {
            Artisan::call('down');
        } else {
            Artisan::call('up');
        }

        return $next($request);
    }
}
