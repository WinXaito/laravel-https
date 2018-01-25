<?php

/**
 * @package WinXaito/laravel-https
 * @author Kevin Vuilleumier <mail@winxaito.com>
 * @copyright 2018 Kevin Vuilleumier
 * @license https://www.gnu.org/licenses/gpl.txt GNU GPL3
 * @link https://github.com/WinXaito/laravel-https
 */

namespace WinXaito\LaravelHttpsRedirect;

use Illuminate\Support\ServiceProvider;

class LaravelHttpsServiceProvider extends ServiceProvider{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        //Publishes
        $this->publishes([
            __DIR__.'/config/installer.php' => config_path('https-redirection.php'),
        ], 'config');

        //Middleware
        $this->app['Illuminate\Contracts\Http\Kernel']->pushMiddleware('WinXaito\LaravelHttpsRedirect\Http\Middleware\HttpsRedirection');
    }
}
